<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/settings'], function (Router $router) {

  $router->post('/', [
    'uses' => 'SettingApiController@createOrUpdate',
    'middleware' => ['auth:api']
  ]);
  $router->get('/', [
    'uses' => 'SettingApiController@index',
    'middleware' => ['auth:api']
  ]);
  $router->get('/fields', [
    'uses' => 'SettingApiController@settingsFields'
  ]);
  $router->get('/{criteria}', [
    'uses' => 'SettingApiController@show'
  ]);
});

