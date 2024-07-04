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

use Modules\Isite\Entities\Webhook;
use Modules\James\Listeners\EventWebhooks;

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

    public function boot()
    {

        parent::boot();
        
       $webhooks = Webhook::with('entity')->get();
       //dd($webhooks);
        foreach ($webhooks as $webhook) {


            $eventName = 'eloquent.'.$webhook->type.': Modules\\' . $webhook->entity->module_name . '\\Entities\\'.$webhook->entity->name;
            //var_dump($eventName);

            

            Event::listen($eventName,  function ($eventData) use ($webhook) {
                $listener = new EventWebhooks($webhook);
                $listener->handle($eventData);
            });
            
        }
    }
}
