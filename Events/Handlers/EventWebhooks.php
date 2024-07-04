<?php

namespace Modules\James\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Modules\Isite\Entities\WebhookEntity;
use Modules\Isite\Entities\Webhook;



class EventWebhooks 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Webhook $webhook)
    {
        $this->webhook = $webhook;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $url = $this->webhook->url;
        $headers = $this->webhook->headers;
        $event = $event->getModel();
        //dd($event);
        if ($this->webhook->method == 'POST') {
             if ($headers !== null) {
                $response = Http::post($url, [
                    'title' => $event->title,
                    'slug' => $event->slug,
                    'headers' => $headers,
                ]);
             }
             else {
                $response = Http::post($url, [
                    'title' => $event->title,
                    'slug' => $event->slug,
                ]);
             }
            
        }
        elseif ($this->webhook->method == 'PUT') {
            if ($headers !== null) {
                $response = Http::post($url, [
                    'title' => $event->title,
                    'slug' => $event->slug,
                    'headers' => $headers,
                ]);
             }
             else {
                $response = Http::post($url, [
                    'title' => $event->title,
                    'slug' => $event->slug,
                ]);
             }
        }

    }
        
}
