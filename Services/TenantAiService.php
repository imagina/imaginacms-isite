<?php

namespace Modules\Isite\Services;

class TenantAiService
{

  private $log = "Isite: TenantAiService|";
  private $pageService;
  private $blogService;
 
  
  public function __construct()
  {
      $this->pageService = app("Modules\Page\Services\PageContentAi");
  }


  public function processAi($tenantId = null)
  {

    \Log::info($this->log."processAi|START");

    //Priority from command (Example)
    if(!is_null($tenantId)){
      tenancy()->initialize($tenantId);
    }

    $category = tenant()->category->title ?? null;
    \Log::info($this->log."processAi|Tenant|Id: ".tenant()->id."|Category: ".$category);


    //$dataToPages = $this->pageService->getPages();
    //dd($dataToPages);
        
    \Log::info($this->log."processAi|END");

  }

  

}