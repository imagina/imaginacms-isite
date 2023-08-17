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


  public function processAi($tenantId = null,$extraData = null)
  {

    \Log::info($this->log."processAi|START");

    //Priority from command (Example)
    if(!is_null($tenantId)){
      tenancy()->initialize($tenantId);
    }

    $category = tenant()->category->title ?? null;
    \Log::info($this->log."processAi|Tenant|Id: ".tenant()->id."|Category: ".$category);

    
    //Ai Service in Modules
    if($extraData==NULL || in_array("page",$extraData)) $resultPages = $this->pageService->startProcesses();
    if($extraData==NULL || in_array("blog",$extraData)) $resultPosts = $this->blogService->startProcesses();
    if($extraData==NULL || in_array("slider",$extraData)) $resultSlides = $this->sliderService->startProcesses();
    
    if(\Schema::hasTable('icommerce__products')){
      if($extraData==NULL || in_array("icommerce",$extraData)) 
        $resultIcommerce = $this->icommerceService->startProcesses();
    }
     
    \Log::info($this->log."processAi|END");

  }
  

}