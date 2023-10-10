<?php

namespace Modules\Isite\Events\Handlers;

class SendNotificationToFront
{
  
  private $log = "Isite: Handler|SendNotificationToFront|";
  public $notificationService;

  public function __construct()
  {
    $this->notificationService = app("Modules\Notification\Services\Inotification");
  }

  public function handle($event)
  {

    \Log::info($this->log."INIT");

    try {
      $model = $event->model;

      if(array_key_exists("is_running", $model["data"]) && is_null($model["data"]["is_running"])) {
        $userId = $model["model"]->getOriginal()["exported_by_id"];
        $message = [
          "message" => trans("isite::cms.modal.syncFinished"),
          "userId" => $userId
        ];

        //Send notification
        $this->notificationService->to(['broadcast' => $userId])->push([
          "title" => "Synchronization has completed",
          "message" => trans("isite::cms.modal.syncFinished"),
          "link" => url('/iadmin/#/ecommerce/products/'),
          "isAction" => false,
          "frontEvent" => [
            "name" => "Isite.synchronizable.status",
            "data" => $message
          ],
          "setting" => ["saveInDatabase" => 1]
        ]);
      }
    } catch (\Exception $e) {
      \Log::info($this->log."ERROR");
      \Log::info($e->getMessage().' '.$e->getFile().' '.$e->getLine());
    }
  }
  
  
}
