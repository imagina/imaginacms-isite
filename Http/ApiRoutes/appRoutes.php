<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/app','middleware' => ['auth:api']], function (Router $router) {
  $router->get('/version', [
    'as' => 'api.isite.app.version',
    'uses' => 'AppApiController@version',
  ]);
  $router->get('/permissions', [
    'as' => 'api.isite.app.permissions',
    'uses' => 'AppApiController@permissions',
  ]);
});