<?php

namespace Modules\Isite\Jobs;

use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAi implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  private $log = "Isite: Jobs|ProcessAi";
  protected $params;
 
  public function __construct($params = [])
  {
    $this->params = $params;
    $this->queue = "ai";
  }

  public function handle()
  {

    \Log::info($this->log."|================================================ INIT");

    //Case Wizard
    /*
      Cuando se ejecutan los jobs por comando no genera ningun error, pero cuando es todo el proceso del Wizard, estos jobs suelen fallar
      Se encontro hasta el momento que solo restaurando funcionaba de nuevo bien y por eso se agrego la siguiente validacion:
    */
    if($this->params["baseClass"]=="Modules\Page\Services\PageContentAi"){
      \Log::info($this->log."|Queue Restart");
      \Artisan::call('queue:restart');
    }

    if(isset($this->params['tenantId'])){

      forceInitializeTenant($this->params['tenantId']);

      if(isset($this->params['multiple'])){
        //Multiple Jobs
        app($this->params["baseClass"])->startProcesses();
      }else{
        //All in one Job
        app("Modules\Isite\Services\TenantAiService")->processAi($this->params['tenantId'],null,0);
      }

    }
    
    \Log::info($this->log."|================================================ END");

  }

}
