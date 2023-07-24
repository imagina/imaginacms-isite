<?php

namespace Modules\Isite\Events\Handlers;

class SendEmailOrganization
{
  
  private $log = "Isite: Handler|SendEmailOrganization|";
  public $notificationService;

  public function __construct()
  {
    $this->notificationService = app("Modules\Notification\Services\Inotification");
  }

  public function handle($event)
  {

    \Log::info($this->log."INIT");

    try {

      $model = $event->organization;
      if(isset($event->user) && !is_null($event->user)){
        $userEmail = $event->user->email;
      }else{
        $user = $model->users->first();
        $userEmail = $user->email;
      }

      $emailsTo[] = $userEmail;
      
      $title = trans("isite::organizations.title.organization created");
      $message = trans("isite::organizations.messages.organization created");
    
      $this->notificationService->to([
        "email" => $emailsTo
       ])->push([
          "title" => $title,
          "message" => $message,
          "fromAddress" => env('MAIL_FROM_ADDRESS'),
          "fromName" => "",
          "setting" => [  
              "saveInDatabase" => 0
          ]
      ]);
      
    } catch (\Exception $e) {
      \Log::info($this->log."ERROR");
      \Log::info($e->getMessage().' '.$e->getFile().' '.$e->getLine());
    }
   
    
  }
  
  
}
