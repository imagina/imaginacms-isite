<?php

namespace Modules\Isite\Providers;

use Anhskohbo\NoCaptcha\NoCaptcha;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Isite\Events\Handlers\RegisterIsiteSidebar;
use Modules\Isite\Http\Middleware\CaptchaMiddleware;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;

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

    $this->app->singleton('formCaptcha', function ($app) {
        return new NoCaptcha(
            setting('isite::reCaptchaV2Secret') ?? setting('isite::reCaptchaV3Secret'),
            setting('isite::reCaptchaV2Site') ?? setting('isite::reCaptchaV3Site'),
            $app['config']['captcha.options']
        );
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
    $this->registerComponentsLivewire();
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
      Blade::componentNamespace("Modules\Isite\View\Components", 'isite');
  }

   /**
   * Register components Livewire
   */
  private function registerComponentsLivewire()
  {

    Livewire::component('isite::items-list', \Modules\Isite\Http\Livewire\Index\ItemsList::class);
    Livewire::component('isite::load-more-button', \Modules\Isite\Http\Livewire\Index\LoadMoreButton::class);

    Livewire::component('isite::filters', \Modules\Isite\Http\Livewire\Filters::class);
    Livewire::component('isite::filter-range', \Modules\Isite\Http\Livewire\Filters\Range::class);
    Livewire::component('isite::filter-checkbox', \Modules\Isite\Http\Livewire\Filters\Checkbox::class);
    Livewire::component('isite::filter-radio', \Modules\Isite\Http\Livewire\Filters\Radio::class);
    Livewire::component('isite::filter-tree', \Modules\Isite\Http\Livewire\Filters\Tree::class);
    Livewire::component('isite::filter-select', \Modules\Isite\Http\Livewire\Filters\Select::class);
    Livewire::component('isite::filter-location', \Modules\Isite\Http\Livewire\Filters\Location::class);


    Livewire::component('isite::filter-order-by', \Modules\Isite\Http\Livewire\Index\Filters\OrderBy::class);

  }

}
