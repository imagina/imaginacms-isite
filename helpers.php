<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

if (!function_exists('alternate')) {

  function alternate($model)
  {

    $alternate = [];
    $supportedLocales = config("laravellocalization.supportedLocales");

    if (count($supportedLocales) == 1) return $alternate;

    $translations = $model->getTranslationsArray() ?? [];

    foreach ($translations as $locale => $data) {
      if (isset($data['slug'])) {
        $href = \URL::to('/' . $locale . '/' . $data['slug']);
        $alternate[$locale] = [
          "slug" => $data['slug'],
          "link" => "<link rel='alternate' hreflang='$locale' href='$href'>"
        ];
      }

    }

    return $alternate;

  }
}

if (!function_exists('getEditLink')) {

  function getEditLink($repository = null, $componentName = null)
  {

    switch ($repository) {
      case 'Modules\Iad\Repositories\AdRepository':
        $editLink = "/iadmin/#/ad/ads/update/";
        $tooltipEditLink = trans("isite::common.editLink.tooltipAd");
        break;
      case 'Modules\Icommerce\Repositories\ProductRepository':
        $editLink = "/iadmin/#/ecommerce/products?edit=";
        $tooltipEditLink = trans("isite::common.editLink.tooltipProduct");
        break;
      case 'Modules\Icommerce\Repositories\CategoryRepository':
        $editLink = "/iadmin/#/ecommerce/product-categories?edit=";
        $tooltipEditLink = trans("isite::common.editLink.tooltipCategory");
        break;
      case 'Modules\Icommerce\Repositories\ManufacturerRepository':
        $editLink = "/iadmin/#/ecommerce/manufacturers?edit=";
        $tooltipEditLink = trans("isite::common.editLink.tooltipManufacturer");
        break;
      case 'Modules\Iblog\Repositories\PostRepository':
        $editLink = "/iadmin/#/blog/posts/index?edit=";
        $tooltipEditLink = trans("isite::common.editLink.tooltipPost");
        break;
      case 'Modules\Iblog\Repositories\CategoryRepository':
        $editLink = "/iadmin/#/blog/categories/index?edit=";
        $tooltipEditLink = trans("isite::common.editLink.tooltipCategory");
        break;
      case 'Modules\Slider\Repositories\SlideRepository':
      case 'Modules\Slider\Repositories\SlideApiRepository':
        $editLink = "/iadmin/#/slider/show/";
        $tooltipEditLink = trans("isite::common.editLink.tooltipSlide");
        break;
      case 'Modules\Iplaces\Repositories\PlaceRepository':
        $editLink = "/iadmin/#/iplaces/places/index?edit=";
        $tooltipEditLink = trans("isite::common.editLink.tooltipPlace");
        break;
      case 'Modules\Iplaces\Repositories\CategoryRepository':
        $editLink = "/iadmin/#/iplaces/categories/index?edit=";
        $tooltipEditLink = trans("isite::common.editLink.tooltipCategory");
        break;
      default:
        switch ($componentName) {
          case 'logo':
            $editLink = "/iadmin/#/iplaces/places/index?edit=";
            $tooltipEditLink = trans("isite::common.editLink.tooltipLogo");
            break;

          default:
            $editLink = "/iadmin/#";
            $tooltipEditLink = trans("isite::common.editLink.tooltip");
            break;
        }
        break;
    }

    return [$editLink, $tooltipEditLink];
  }
}

if (!function_exists('isiteFormatMoney')) {

  function isiteFormatMoney($value, $showCurrencyCode = false, $config = "asgard.isite.config.isiteFormatMoney")
  {
    $format = (object)(Config::get($config) ?? [
      'decimals' => 0,
      'decimal_separator' => '',
      'thousands_separator' => '.'
    ]);

    $numberFormat = number_format($value, $format->decimals, $format->decimal_separator, $format->thousands_separator);

    if (is_module_enabled('Icommerce')) {
      if ($showCurrencyCode) {
        $currency = currentCurrency();
        $numberFormat = $numberFormat . " " . $currency->code;
      }
    }

    return $numberFormat;

  }

}

if (!function_exists('generatePassword')) {
  function generatePassword($length = 12, $add_dashes = false, $available_sets = 'luds')
  {
    $sets = array();
    if (strpos($available_sets, 'l') !== false)
      $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if (strpos($available_sets, 'u') !== false)
      $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if (strpos($available_sets, 'd') !== false)
      $sets[] = '23456789';
    if (strpos($available_sets, 's') !== false)
      $sets[] = '!@#$%&*?/_-+';
    $all = '';
    $password = '';
    foreach ($sets as $set) {
      $password .= $set[array_rand(str_split($set))];
      $all .= $set;
    }
    $all = str_split($all);
    for ($i = 0; $i < $length - count($sets); $i++)
      $password .= $all[array_rand($all)];
    $password = str_shuffle($password);
    if (!$add_dashes)
      return $password;
    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while (strlen($password) > $dash_len) {
      $dash_str .= substr($password, 0, $dash_len) . '-';
      $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
  }
}

if (!function_exists('isMobileDevice')) {
  function isMobileDevice()
  {
    if (isset($_SERVER["HTTP_USER_AGENT"])) {
      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
              |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
        , $_SERVER["HTTP_USER_AGENT"]);
    } else {
      return false;
    }
  }
}

/*
* Locale in url - SET
*/
if (!function_exists('setLocaleInUrl')) {

  function setLocaleInUrl($locale)
  {
    //Don't allow click at the same locale button
    if ($locale == locale()) return null;
    //Instance the default locale url
    $localeUrl = url()->current() . '?' . http_build_query(['lang' => $locale]);
    //Validate if it's homepage change de localUrl
    if (str_contains(Route::currentRouteName(), 'homepage')) {
      $localeUrl = LaravelLocalization::getLocalizedURL($locale);
    }
    //Response
    return $localeUrl;
  }

}

/*
* Locale in url - GET
*/
if (!function_exists('validateLocaleFromUrl')) {

  function validateLocaleFromUrl($request, $params = null)
  {

    $locale = locale();

    if ($request->has('lang') && $request->lang != $locale) {

      $locale = $request->lang;

      //Casos: Home
      if (!isset($params))
        $newUrl = url($locale);

      //Casos: Index Icommerce (Store es traduccion)
      if (isset($params['fixedTrans']))
        $newUrl = url($locale) . '/' . trans($params['fixedTrans'], [], $locale);

      //Casos: Pages,Iblog (Index Categoria), Icommerce(Index Categoria)
      if (isset($params['entity'])) {
        $newUrl = $params['entity']->getUrlAttribute($locale);
      }

      // vars to reedirect
      $result["reedirect"] = true;
      $result["url"] = $newUrl;

      // Sto no funco para las paginas
      /*
      if(isset($newUrl))
        header("Location: ".$newUrl);
      */
    }

    $result["locale"] = $locale;

    return $result;

  }

}

/**
 * Helper to show infor connection in Log or others
 */
if (!function_exists('showDataConnection')) {

  function showDataConnection($inLog = true)
  {

    $dbname = \DB::connection()->getDatabaseName();
    if ($inLog)
      \Log::info("********||||******** Isite: Helper|ShowDataConnection|DB: " . $dbname);
  }

}

if (!function_exists('addQueryParamToUrl')) {
  function addQueryParamToUrl($url, $paramName, $paramValue)
  {
    // Parse the URL
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
      // URL already has query parameters
      $queryParams = array();
      parse_str($parsedUrl['query'], $queryParams);

      // Add or update the query parameter
      $queryParams[$paramName] = $paramValue;

      // Build the updated query string
      $updatedQuery = http_build_query($queryParams);

      // Reconstruct the URL with the updated query string
      $parsedUrl['query'] = $updatedQuery;
      $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] . '://' : '';
      $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
      $port = isset($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '';
      $user = isset($parsedUrl['user']) ? $parsedUrl['user'] : '';
      $pass = isset($parsedUrl['pass']) ? ':' . $parsedUrl['pass'] : '';
      $pass = ($user || $pass) ? "$pass@" : '';
      $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
      $query = isset($parsedUrl['query']) ? '?' . $parsedUrl['query'] : '';
      $fragment = isset($parsedUrl['fragment']) ? '#' . $parsedUrl['fragment'] : '';
      //Set URL
      $url = "$scheme$user$pass$host$port$path$query$fragment";
    } else {
      // URL doesn't have query parameters, simply append the new query parameter
      $url .= '?' . urlencode($paramName) . '=' . urlencode($paramValue);
    }

    return $url;
  }
}

/**
 *
 */
if (!function_exists('forceInitializeTenant')) {

  function forceInitializeTenant($tenantId)
  {

    \Log::info("Isite: Helper|forceInitializeTenant|tenantId: " . $tenantId);

    if (tenancy()->initialized) {
      tenancy()->end();
    }

    tenancy()->initialize(tenancy()->find($tenantId));

  }

}

/**
 * @param $centralOrg (Central Organization has data to connect DB)
 */
if (!function_exists('switchDataConnection')) {

  function switchDataConnection($centralOrg = null)
  {

    if (isset(tenant()->id)) {
      $tenantId = tenant()->id;
      \Log::info("Isite: Helper|switchDataConnection|tenantId: " . $tenantId);


      if (!is_null($centralOrg)) {
        \Log::info("Isite: Helper|switchDataConnection|TenancyDb: " . $centralOrg->tenancy_db_name);

        $currentDb = \DB::connection()->getDatabaseName();
        \Log::info("Isite: Helper|switchDataConnection|CurrentDb: " . $currentDb);


        if ($currentDb != $centralOrg->tenancy_db_name) {

          \Log::info("Isite: Helper|switchDataConnection|Switching....");

          // Get mysql data to connection
          $dataMySql = config('database.connections.mysql');
          $dataMySqlTenant = [
            "database" => $centralOrg->tenancy_db_name,
            "username" => $centralOrg->tenancy_db_username,
            "password" => $centralOrg->tenancy_db_password,
            'table' => 'cache'
          ];

          // Add new data
          $newDataConnection = array_merge($dataMySql, $dataMySqlTenant);

          //\Log::info("Isite: Helper|switchDataConnection|NewData: ".json_encode($newDataConnection));

          //Si cambia pero da un error al guardar datos luego
          /*
          Call to a member function beginTransaction() on null {"exception":"[object] (Error(code: 0): Call to a member function beginTransaction() on null
            at /home/wygo/webapps/dev-weygo/icms/vendor/laravel/framework/src/Illuminate/Database/Concerns/ManagesTransactions.php:175
          */
          \DB::purge('mysql');
          \Config::set('database.connections.mysql', $newDataConnection);

          showDataConnection();

        }

      }

    }

  }

}

if (!function_exists('convertObjectValuesToArray')) {
  function convertObjectValuesToArray($data)
  {
    if (is_object($data)) {
      $data = json_decode(json_encode($data), true);
      foreach ($data as &$value) {
        $value = convertObjectValuesToArray($value);
      }
    } elseif (is_array($data)) {
      foreach ($data as &$value) {
        $value = convertObjectValuesToArray($value);
      }
    }

    return $data;
  }
}

/**
 * Clear Response Cache | Example: Required to Warehouse Confirm Button Process
 */
if (!function_exists('clearResponseCache')) {
  function clearResponseCache()
  {
    if (!is_null(config('responsecache.enabled')) && config('responsecache.enabled')) {
      \ResponseCache::clear();
    }
  }
}

if (!function_exists('iconfig')) {
  function iconfig($configName = null, $byModule = false)
  {
    //Init response
    $response = config("asgard");

    if ($configName && strlen($configName)) {
      $modules = app('modules');//Init modules
      $enabledModules = $modules->allEnabled();//Get all enable modules

      //Get config by name to each module
      if ($byModule) {
        $response = [];
        foreach (array_keys($enabledModules) as $moduleName) {
          $response[$moduleName] = config("asgard." . strtolower($moduleName) . "." . $configName);
        }
      } else {
        $configNameExplode = explode('.', $configName);
        $response = config("asgard." . strtolower(array_shift($configNameExplode)) . "." . implode('.', $configNameExplode));
      }
    }

    return $response;
  }
}

/**
 * SAnitize a search parameter
 */
if (!function_exists('sanitizeSearchParameter')) {
  function sanitizeSearchParameter($searchParam)
  {
    // Define the characters to keep, including Spanish letters and accents
    $allowedChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 áéíóúÁÉÍÓÚñÑ';

    // Use a regular expression to remove any character not in the allowed set
    $sanitizedParam = preg_replace('/[^' . preg_quote($allowedChars, '/') . ']/u', '', $searchParam);

    // Replace multiple spaces with a single space
    $sanitizedParam = preg_replace('/\s+/', ' ', $sanitizedParam);

    // Trim leading and trailing spaces
    $sanitizedParam = trim($sanitizedParam);

    return $sanitizedParam;
  }
}

if (!function_exists('humanizeDuration')) {
  function humanizeDuration($startDate, $endDate)
  {
    if (!$endDate) {
      return null;
    }

    $start = Carbon::parse($startDate);
    $end = Carbon::parse($endDate);

    $diffInMinutes = $start->diffInMinutes($end);

    $days = floor($diffInMinutes / (60 * 24));
    $hours = floor(($diffInMinutes % (60 * 24)) / 60);
    $minutes = $diffInMinutes % 60;

    return ($days > 0 ? $days . ' ' . trans('isite::isite.days') . ' ' : '') .
      ($hours > 0 ? $hours . ' ' . trans('isite::isite.hours') . ' ' : '') .
      ($minutes > 0 ? $minutes . ' ' . trans('isite::isite.minutes') : '');
  }
}

if (!function_exists('convertMinutesToHumanReadable')) {
  function convertMinutesToHumanReadable($minutes)
  {
    if (!$minutes) return 0;
    if ($minutes < 60) {
      return $minutes . ' ' . trans('isite::isite.minutes');
    }

    $weeks = floor($minutes / (60 * 24 * 7));
    $days = floor(($minutes % (60 * 24 * 7)) / (60 * 24));
    $hours = floor(($minutes % (60 * 24)) / 60);
    $remainingMinutes = $minutes % 60;

    $result = '';

    if ($weeks > 0) {
      $result .= $weeks . ' ' . trans('isite::isite.weeks') . ' ';
    }

    if ($days > 0) {
      $result .= $days . ' ' . trans('isite::isite.days') . ' ';
    }

    if ($hours > 0) {
      $result .= $hours . ' ' . trans('isite::isite.hours') . ' ';
    }

    if ($remainingMinutes > 0) {
      $result .= trans('isite::isite.and') . ' ' . $remainingMinutes . ' ' . trans('isite::isite.minutes');
    }

    return $result;
  }
}
