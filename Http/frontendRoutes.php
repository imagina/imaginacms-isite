<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Str;

$locale = LaravelLocalization::setLocale() ?: App::getLocale();

Route::domain('{subdomain}.'.Str::remove('https://', env('APP_URL', 'localhost')))->group(function (Router $router) use ($locale) {
  
  $router->get('/', [
    'as' => $locale . '.organization.index',
    'uses' => 'PublicController@organizationIndex',
    'middleware' => ['universal',\Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain::class]
  ]);
  
});

#==================================================== Partials to the Ipanel

$router->get('isite/header', [
  'as' => 'isite.header',
  'uses' => 'PublicController@header'
]);
$router->get('isite/footer', [
  'as' => 'isite.footer',
  'uses' => 'PublicController@footer'
]);
$router->get('isite/pdf', [
  'as' => 'isite.pdf',
  'uses' => 'PublicController@pdf'
]);
