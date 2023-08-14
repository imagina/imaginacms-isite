<?php

namespace Modules\Isite\Services;

class TenantAiService
{

  private $log = "Isite: TenantAiService|";

  private $pageService;
  private $blogService;
  private $sliderService;
  private $icommerceService;
 
  
  public function __construct()
  {
      $this->pageService = app("Modules\Page\Services\PageContentAi");
      $this->blogService = app("Modules\Iblog\Services\BlogContentAi");
      $this->sliderService = app("Modules\Slider\Services\SliderContentAi");
      $this->icommerceService = app("Modules\Icommerce\Services\IcommerceContentAi");
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

    
    //Ai Service in Modules
    $resultPages = $this->pageService->startProcesses();
    $resultPosts = $this->blogService->startProcesses();
    $resultSlides = $this->sliderService->startProcesses();
    
    if(\Schema::hasTable('icommerce__products'))
      $resultIcommerce = $this->icommerceService->startProcesses();
    
    \Log::info($this->log."processAi|END");

  }
  

}