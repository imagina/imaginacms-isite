<?php

namespace Modules\Isite\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Modules\User\Permissions\PermissionManager;

class AppApiController extends BaseApiController
{
    private $address;

    private $permissions;

    public function __construct(PermissionManager $permissions)
    {
        $this->permissions = $permissions;
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
}
