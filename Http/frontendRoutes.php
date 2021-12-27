<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Str;

$locale = LaravelLocalization::setLocale() ?: App::getLocale();

if(!empty(json_decode(setting("isite::rolesToTenant",null,"[]")))){
  Route::domain('{subdomain}.'.Str::remove('https://', env('APP_URL', 'localhost')))->group(function (Router $router) use ($locale) {
    
    $router->get('/', [
      'as' => $locale . '.organization.index',
      'uses' => 'PublicController@organizationIndex',
      'middleware' => ['universal',\Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain::class]
    ]);
    
  });
}

/**
 *
 */
$router->any('{uri}', [
  'uses' => 'PublicController@uri',
  'as' => 'site',
])->where('uri', '.*');
