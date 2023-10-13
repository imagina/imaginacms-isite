<?php

namespace Modules\Isite\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Isite\Events\Handlers\CreateOrganizationByRole;
use Modules\Iprofile\Events\UserCreatedEvent;
use Modules\Isite\Events\OrganizationWasUpdated;
use Modules\Isite\Events\Handlers\SetMaintenanceMode;

use Illuminate\Support\Facades\Event;
use Modules\Isite\Events\Handlers\CreateOrganizationBySuscription;

use Modules\Isite\Events\Handlers\SendEmailOrganization;
use Modules\Isite\Events\Handlers\NotifyIsRunningEnds;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        /*
        UserCreatedEvent::class => [
            CreateOrganizationByRole::class
        ],
        */
        /*
        OrganizationWasUpdated::class => [
            SetMaintenanceMode::class
        ],
        */
        
    ];

    public function register()
    {
        if (is_module_enabled('Iplan')) {
            Event::listen(
              "Modules\\Iplan\\Events\\SubscriptionHasStarted",
              [CreateOrganizationBySuscription::class, 'handle']
            );
        }

      
        Event::listen(
            "Modules\\Isite\\Events\\OrganizationWasCreated",
            [SendEmailOrganization::class, 'handle']
        );
        

        Event::listen(
            "Modules\\Isite\\Events\\OrganizationWasUpdated",
            [SetMaintenanceMode::class, 'handle']
        );

        Event::listen(
            "Modules\\Isite\\Events\\SynchronizableWasUpdated",
            [NotifyIsRunningEnds::class, 'handle']
        );
    }
}
