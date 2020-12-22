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

      Blade::component('isite-owl-carousel', \Modules\Isite\View\Components\carousel\OwlCarousel::class);
      Blade::component('isite-menu', \Modules\Isite\View\Components\menu\Menu::class);
      Blade::component('isite-header', \Modules\Isite\View\Components\header\Header::class);
      Blade::component('isite-social', \Modules\Isite\View\Components\social\Social::class);
      Blade::component('isite-whatsapp', \Modules\Isite\View\Components\whatsapp\Whatsapp::class);
      Blade::component('isite-item-list', \Modules\Isite\View\Components\ItemList\ItemList::class);
      Blade::component('isite-contact-addresses', \Modules\Isite\View\Components\contact\ContactAddresses::class);
      Blade::component('isite-contact-emails', \Modules\Isite\View\Components\contact\ContactEmails::class);
      Blade::component('isite-contact-phones', \Modules\Isite\View\Components\contact\ContactPhones::class);
      Blade::component('isite-logo', \Modules\Isite\View\Components\Logo::class);
      Blade::componentNamespace("Modules\Isite\View\Components", 'isite');

  }
}
