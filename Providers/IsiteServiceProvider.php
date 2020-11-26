<?php

namespace Modules\Isite\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Isite\Events\Handlers\RegisterIsiteSidebar;
use Modules\Isite\Http\Middleware\CaptchaMiddleware;
use Illuminate\Support\Facades\Blade;

class IsiteServiceProvider extends ServiceProvider
{
  use CanPublishConfiguration;
  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  protected $middleware = [
    'captcha' => CaptchaMiddleware::class
  ];

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->registerBindings();
    $this->app['events']->listen(BuildingSidebar::class, RegisterIsiteSidebar::class);

    $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
      $event->load('sites', Arr::dot(trans('isite::sites')));
      // append translations

    });
  }

  public function boot()
  {
    $this->registerMiddleware();
    $this->publishConfig('isite', 'config');
    $this->publishConfig('isite', 'permissions');
    $this->publishConfig('isite', 'settings');
    $this->publishConfig('isite', 'settings-fields');
    $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
  
    $this->registerComponents();
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return array();
  }

  private function registerBindings()
  {


  }

  private function registerMiddleware()
  {
    foreach ($this->middleware as $name => $class) {
      $this->app['router']->aliasMiddleware($name, $class);
    }
  }
  
  
  /**
   * Register Blade components
   */
  
  private function registerComponents(){
    
    Blade::component('isite-owl-carousel', \Modules\Isite\View\Components\OwlCarousel::class);
    
  }
}
