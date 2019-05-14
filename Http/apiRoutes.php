<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/isite/v1',/*'middleware' => ['auth:api']*/], function (Router $router) {
  
  $router->get('/', [
    'as' => 'api.isite.index',
    'uses' => 'SiteApiController@index',
  ]);

  $router->get('/available-locales', [
    'as' => 'api.isite.available-locales',
    'uses' => 'SiteApiController@availableLocales',
  ]);
  
  $router->put('/', [
    'as' => 'api.isite.update',
    'uses' => 'SiteApiController@update',
  ]);
  
  //======  SETTINGS
  require('ApiRoutes/settingsRoutes.php');
  
  //======  APP
  require('ApiRoutes/appRoutes.php');
});
