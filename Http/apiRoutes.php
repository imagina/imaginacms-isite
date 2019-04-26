<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/isite','middleware' => ['auth:api']], function (Router $router) {

  $router->get('/', [
    'as' => 'api.isite.index',
    'uses' => 'SiteApiController@index',
  ]);
  $router->put('/', [
    'as' => 'api.isite.update',
    'uses' => 'SiteApiController@update',
  ]);

  
});
