<?php

use Illuminate\Support\Facades\Route;
use Modules\Isite\Http\Controllers\Api\ConfigsApiController;
use Modules\Isite\Http\Controllers\Api\ContactApiController;
use Modules\Isite\Http\Controllers\Api\WhatsappApiController;

Route::prefix('/isite/v1')->group(function () {

  Route::prefix('/configs')->group(function () {
    Route::get('/', [ConfigsApiController::class, 'index']);
    Route::get('/modules-info', [ConfigsApiController::class, 'modulesInfo']);
  });


  Route::apiCrud([
    'module' => 'isite',
    'prefix' => 'contacts',
    'controller' => ContactApiController::class,
    'permission' => 'isite.contacts',
    'middleware' => ['index' => [], 'show' => []],
    // 'customRoutes' => [ // Include custom routes if needed
    //  [
    //    'method' => 'post', // get,post,put....
    //    'path' => '/some-path', // Route Path
    //    'uses' => 'ControllerMethodName', //Name of the controller method to use
    //    'middleware' => [] // if not set up middleware, auth:api will be the default
    //  ]
    // ]
  ]);

  /**
   * STATICS CLASS
   */
  Route::apiCrud([
    'module' => 'isite',
    'prefix' => 'contact-types',
    'staticEntity' => 'Modules\Isite\Models\ContactType',
    'middleware' => ['index' => [], 'show' => []]
  ]);

  Route::apiCrud([
    'module' => 'isite',
    'prefix' => 'statuses',
    'staticEntity' => 'Modules\Isite\Models\Status',
    'middleware' => ['index' => [], 'show' => []]
  ]);

  Route::apiCrud([
    'module' => 'isite',
    'prefix' => 'whatsapps',
    'controller' => WhatsappApiController::class,
    'permission' => 'isite.whatsapps',
    'middleware' => ['index' => [], 'show' => []],
    // 'customRoutes' => [ // Include custom routes if needed
    //  [
    //    'method' => 'post', // get,post,put....
    //    'path' => '/some-path', // Route Path
    //    'uses' => 'ControllerMethodName', //Name of the controller method to use
    //    'middleware' => [] // if not set up middleware, auth:api will be the default
    //  ]
    // ]
  ]);

  // append

});
