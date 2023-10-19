<?php

namespace Modules\Isite\Events\Handlers;

class NotifyIsRunningEnds
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
        $originalModel = $model["model"]->getOriginal();
        $userId = $originalModel["exported_by_id"];
        // Regular expression to find the word with an uppercase letter
        preg_match('/[A-Z][a-z]*/', $originalModel["name"], $matches);
        // Convert the word to lowercase
        $entity = strtolower($matches[0]);
        //Translate the entity
        $entity = ['entity' => trans("isite::cms.modal.$entity")];

        $message = [
          "message" => trans("isite::cms.modal.syncFinished", $entity),
          "userId" => $userId
        ];

        //Send notification
        $this->notificationService->to(['broadcast' => $userId])->push([
          "title" => trans("isite::cms.modal.syncCompleted"),
          "message" => trans("isite::cms.modal.syncFinished", $entity),
          "link" => url('/iadmin/#/'),
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
