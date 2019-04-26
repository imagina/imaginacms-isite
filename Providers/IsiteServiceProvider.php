<?php

namespace Modules\Isite\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Isite\Events\Handlers\RegisterIsiteSidebar;

class IsiteServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

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
            $event->load('sites', array_dot(trans('isite::sites')));
            // append translations

        });
    }

    public function boot()
    {
      $this->publishConfig('isite', 'config');
        $this->publishConfig('isite', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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
        $this->app->bind(
            'Modules\Isite\Repositories\SiteRepository',
            function () {
                $repository = new \Modules\Isite\Repositories\Eloquent\EloquentSiteRepository(new \Modules\Isite\Entities\Site());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Isite\Repositories\Cache\CacheSiteDecorator($repository);
            }
        );
// add bindings

    }
}
