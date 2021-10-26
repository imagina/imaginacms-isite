<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/isite/v1'], function (Router $router) {
  //======  SETTINGS
  require('ApiRoutes/settingsRoutes.php');
  //======  APP
  require('ApiRoutes/siteRoutes.php');
  //======  Configs
  require('ApiRoutes/configsRoutes.php');
  //======  Export
  require('ApiRoutes/exportRoutes.php');
  //======  Recomendation
  require('ApiRoutes/recommendationRoutes.php');

  $router->apiCrud([
    'module' => 'isite',
    'prefix' => 'organizations',
    'controller' => 'OrganizationApiController',
    'middleware' => []
  ]);
  
  $router->apiCrud([
    'module' => 'isite',
    'prefix' => 'categories',
    'controller' => 'CategoryApiController',
    'middleware' => ['index' => []]
  ]);
  $router->apiCrud([
    'module' => 'isite',
    'prefix' => 'icruds',
    'controller' => 'IcrudApiController',
    'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []]
  ]);
// append

});
