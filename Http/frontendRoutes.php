<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Str;

$locale = LaravelLocalization::setLocale() ?: App::getLocale();
//
//$router->get('/', [
//    'uses' => 'PublicController@homepage',
//    'as' => 'homepage',
//  'middleware' => ['universal',Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,\Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain::class]
//]);
//


/**
 *
 */
$router->any('{uri}', [
  'uses' => 'PublicController@uri',
  'as' => 'site',
])->where('uri', '.*');
