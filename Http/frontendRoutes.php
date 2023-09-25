<?php

use Illuminate\Routing\Router;

$locale = locale();
//
//$router->get('/', [
//    'uses' => 'PublicController@homepage',
//    'as' => 'homepage',
//  'middleware' => ['universal',Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,\Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain::class]
//]);
//
$middlewares = [];

(
    ! empty(json_decode(setting('isite::rolesToTenant', null, '[]')))

) ?
  $middlewares = [
      'universal',
      \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
  ] :
  $middlewares = [];

/** @var Router $router */
Route::prefix(LaravelLocalization::setLocale())->group(function (Router $router) use ($locale) {
    $router->get(trans('isite::routes.organizations.index.index'), [
        'as' => $locale.'.isite.organizations.index',
        'uses' => 'PublicController@index',
    ]);

    $router->get(trans('isite::routes.organizations.index.category'), [
        'as' => $locale.'.isite.organizations.index.category',
        'uses' => 'PublicController@index',
    ]);
});

Route::get('/', [
    'uses' => '\Modules\Page\Http\Controllers\PublicController@homepage',
    'as' => $locale.'.homepage',
    'middleware' => $middlewares,
]);

Route::any('{uri}', [
    'uses' => '\Modules\Isite\Http\Controllers\PublicController@uri',
    'as' => $locale.'.site',
    'middleware' => $middlewares,
])->where('uri', '.*');
