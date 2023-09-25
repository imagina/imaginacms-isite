<?php

namespace Modules\Isite\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Modules\Core\Foundation\Theme\ThemeManager;
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Modules\Isite\Services\TenantService;
use Modules\Isite\Transformers\NwidartModuleTransformer;
use Modules\Setting\Repositories\SettingRepository;
use Modules\User\Permissions\PermissionManager;
use Spatie\ResponseCache\Facades\ResponseCache;

//Controller

class SiteApiController extends BaseApiController
{
    /**
     * @var PaypalconfigRepository
     */
    private $setting;

    private $module;

    private $permissions;

    private $themeManager;

    private $settingController;

    private $tenantService;

    public function __construct(
    SettingRepository $setting,
    ThemeManager $themeManager,
    PermissionManager $permissions,
    TenantService $tenantService)
    {
        $this->module = app('modules');
        $this->setting = $setting;
        $this->themeManager = $themeManager;
        $this->permissions = $permissions;
        $this->settingController = app('Modules\Isite\Http\Controllers\Api\SettingApiController');
        $this->tenantService = $tenantService;
    }

    /**
     * GET ITEMS
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            //Request to Repository
            $params = $this->getParamsRequest($request);

            $enabledModules = $this->module->allEnabled();
            // getting modules with settings and enabled
            $modulesWithSettings = $this->setting->moduleSettings($enabledModules);

            $dbSettings = [];
            $translatableSettings = [];
            $plainSettings = [];

            // fetching settings in DB by module
            foreach ($modulesWithSettings as $key => $module) {
                $translatableSettings[$key] = $this->setting->translatableModuleSettings($key);
                $plainSettings[$key] = $this->setting->plainModuleSettings($key);
                $dbSettings[$key] = $this->setting->savedModuleSettings($key);
            }

            // merging translatable and plain settings
            $mergedSettings = array_merge_recursive($translatableSettings, $plainSettings);

            //getting available locales
            $locales = config('asgard.core.available-locales');

            foreach ($locales as $key => &$locale) {
                $locale['iso'] = $key;
            }

            //getting plubic themes available
            $themes = [];
            foreach ($this->themeManager->allPublicThemes() as $key => $theme) {
                $themes[$key] = [
                    'name' => $theme->getName(),
                    'path' => $theme->getPath(),
                    'lowerName' => $theme->getLowerName(),
                ];
            }

            //Get all settings (With new setting controller)
            $settingsResponse = [];
            $allSettings = $this->validateResponseApi($this->settingController->index(new Request()));
            foreach ($allSettings as $settingObj) {
                $settingsResponse = array_merge($settingsResponse, collect($settingObj)->values()->toArray());
            }

            //Response
            $response = [
                'data' => [
                    //"siteSettings" => $this->transformSettings($dbSettings, $mergedSettings),
                    'siteSettings' => $settingsResponse,
                    'availableLocales' => array_values($locales),
                    'availableThemes' => array_values($themes),
                    'defaultLocale' => config('app.locale'),
                    'modulesEnabled' => NwidartModuleTransformer::collection($enabledModules),
                ],
            ];

            //Return specific setting group
            if (isset($params->filter->settingGroupName)) {
                $response['data'] = $response['data'][$params->filter->settingGroupName] ?? [];
            }
        } catch (\Exception $e) {
            $status = $this->getStatusError($e->getCode());
            $response = ['errors' => $e->getMessage()];
        }

        //Return response
        return response()->json($response, $status ?? 200);
    }

    /**
     * UPDATE ITEM
     *
     * @param $criteria
     * @return mixed
     */
    public function update(Request $request)
    {
        \DB::beginTransaction(); //DB Transaction
        try {
            $data = $request->input('attributes');

            $allowedSettings = config('asgard.isite.config.allowedSettings');
            $imageSettings = config('asgard.isite.config.imageSettings');
            $this->saveImages($data, $allowedSettings, $imageSettings);

            $newData = [];
            foreach ($data as $key => $val) {
                if (in_array($key, $allowedSettings)) {
                    $newData[$key] = $val;
                }
            }

            $this->setting->createOrUpdate(['isite::siteSettings' => $newData]);

            //Response
            $response = ['data' => 'Item Updated'];
            \DB::commit(); //Commit to DataBase
        } catch (\Exception $e) {
            \DB::rollback(); //Rollback to Data Base
            $status = $this->getStatusError($e->getCode());
            $response = ['errors' => $e->getMessage()];
        }

        //Return response
        return response()->json($response, $status ?? 200);
    }

    /**
     * transformer for settings to the front app
     *
     * @param $modules
     * @return mixed
     */
    public function transformSettings(&$dbSettings, $mergedSettings)
    {
        $transformedModules = [];
        foreach ($dbSettings as $keyModule => &$module) {
            foreach ($module as $keySetting => &$setting) {
                $keyReplaced = Str::replaceFirst(strtolower($keyModule).'::', '', $keySetting);

                if ($setting->isMedia()) {
                    $media = $setting->files()->where('zone', $setting->name)->first() ?? null;

                    if ($media === null) {
                        $setting['media'] = [
                            'mimeType' => 'image/jpeg',
                            'path' => url('modules/isite/img/defaultLogo.jpg'),
                        ];
                    } else {
                        $setting['media'] = [
                            'mimeType' => $media->mimetype,
                            'path' => $media->path_string,
                        ];
                    }
                }

                if (isset($mergedSettings[$keyModule][$keyReplaced])) {
                    // merging data on DB with config setting
                    $setting = array_merge($mergedSettings[$keyModule][$keyReplaced], $setting->toArray());
                }

                // decode plain value if is object or array
                $plainValue = $setting['plainValue'];
                $plainValue = $this->isJson($plainValue) ? json_decode($plainValue) : $plainValue;

                // update plain value
                $setting['plainValue'] = $plainValue;

                // parsing isTranslatable to Boolean
                $setting['isTranslatable'] = $setting['isTranslatable'] == '0' ? false : true;

                // translate description
                $description = $setting['description'];
                $setting['description'] = trans($description);

                // setting value off settings not translatable
                if (! $setting['isTranslatable']) {
                    $setting['value'] = $setting['plainValue'];
                }

                // type setting standard based in view param
                $setting['type'] = $setting['view'];
                if (Str::contains($setting['view'], 'select')) {
                    $setting['type'] = 'select';
                }

                // type setting standard based in view param
                if (Str::contains($setting['view'], 'select-multi')) {
                    $setting['type'] = 'select-multi';
                }

                // init boolean value when type is checkbox
                if ($setting['type'] == 'checkbox') {
                    if ($setting['value'] == '1') {
                        $setting['value'] = true;
                    } else {
                        $setting['value'] = false;
                    }
                }

                // type setting standard based in view param
                if (Str::contains($setting['view'], 'file')) {
                    $setting['type'] = 'file';
                    if (! isset($setting['media'])) {
                        $setting['media'] = [
                            'mimeType' => 'image/jpeg',
                            'path' => url('modules/isite/img/defaultLogo.jpg'),
                        ];
                    }
                }

                // type setting standard based in view param
                if (Str::contains($setting['view'], 'file-multi')) {
                    $setting['type'] = 'file-multi';
                }

                // type setting standard based in view param
                if (Str::contains($setting['view'], 'color')) {
                    $setting['type'] = 'color';
                }

                // type setting standard based in view param
                if (Str::contains($setting['view'], 'text-multi')) {
                    $setting['type'] = 'text-multi';
                    if (! $setting['value']) {
                        $setting['value'] = [];
                    }
                }
                // type setting standard based in view param
                if (Str::contains($setting['view'], 'text-multi-with-options')) {
                    $setting['type'] = 'text-multi-with-options';
                    if (! $setting['value']) {
                        $setting['value'] = [];
                    }
                }
                // type setting standard based in view param
                if (Str::contains($setting['view'], 'checkbox-multi-with-options')) {
                    $setting['type'] = 'checkbox-multi-with-options';
                    if (! $setting['value']) {
                        $setting['value'] = [];
                    }
                }

                // type setting standard based in view param
                if (isset($setting['custom']) && $setting['custom']) {
                    $setting['type'] = $setting['view'];
                    if (isset($setting['default']) && ! $setting['value']) {
                        $setting['value'] = $setting['default'];
                    }
                }
            }
        }

        return array_values(Arr::collapse(array_values($dbSettings)));
    }

    /**
     * check if
     */
    private function isJson($string)
    {
        return ((is_string($string) &&
          (is_object(json_decode($string)) ||
            is_array(json_decode($string))))) ? true : false;
    }

    /**
     * Return Version to front-end
     *
     * @return mixed
     */
    public function version(Request $request)
    {
        try {
            $response = ['data' => config('app.version')];
        } catch (\Exception $e) {
            $status = $this->getStatusError($e->getCode());
            $response = ['errors' => $e->getMessage()];
        }

        //Return response
        return response()->json($response, $status ?? 200);
    }

    /**
     * Return permission of backend
     *
     * @return mixed
     */
    public function permissions()
    {
        try {
            $permissions = $this->permissions->all();
            $modules = $this->module->allEnabled();
            $response = [];

            if (isset($modules)) {
                foreach ($modules as $module) {
                    if (isset($permissions[$module->getName()])) {
                        $response[$module->getName()] = $permissions[$module->getName()];
                    }
                }
            }

            //Response
            $response = ['data' => $response];
        } catch (\Exception $e) {
            $status = $this->getStatusError($e->getCode());
            $response = ['errors' => $e->getMessage()];
        }

        //Return response
        return response()->json($response, $status ?? 200);
    }

    /**
     * Cache clear
     *
     * @return mixed
     */
    public function cacheClear(Request $request)
    {
        try {
            //clear spatie larevel-responsecache
            ResponseCache::clear();
            //Artisan Cache clear
            Artisan::call('cache:clear');

            //Response
            $response = ['data' => []];
        } catch (\Exception $e) {
            $status = $this->getStatusError($e->getCode());
            $response = [
                'errors' => $e->getMessage(),
                'messages' => [['type' => 'error', 'message' => trans('isite::sites.failedCacheClear')]],
            ];
        }
        //Return response
        return response()->json($response ?? ['data' => 'Request successful'], $status ?? 200);
    }

    /**
     * Create Site - Tenant
     */
    public function create(Request $request)
    {
        $data = $request->input('attributes');

        // try {

        $response = $this->tenantService->createTenantInMultiDatabase($data);

        //Response
        $response = ['data' => $response];
        //  \DB::commit();//Commit to DataBase
//     } catch (\Exception $e) {
//      // \DB::rollback();//Rollback to Data Base
//       $status = $this->getStatusError($e->getCode());
//       $response = ["errors" => $e->getMessage()];
//     }
        return response()->json($response, $status ?? 200);
    }

    public function activateModule(Request $request)
    {
        $data = $request->input('attributes');

        try {
            $response = $this->tenantService->activateModule($data);

            //Response
            $response = ['data' => $response];
            \DB::commit(); //Commit to DataBase
        } catch (\Exception $e) {
            \DB::rollback(); //Rollback to Data Base
            $status = $this->getStatusError($e->getCode());
            $response = ['errors' => $e->getMessage()];
        }

    return response()->json($response, $status ?? 200);
    }

    public function tenantUpdate(Request $request)
    {
        $data = $request->input('attributes');

        try {
            $response = $this->tenantService->updateTenant($data);

            //Response
            $response = ['data' => 'Tenant Updated'];
        } catch (\Exception $e) {
            $status = $this->getStatusError($e->getCode());
            $response = ['errors' => $e->getMessage()];
        }

        return response()->json($response, $status ?? 200);
    }
}
