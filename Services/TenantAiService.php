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

    //============================ Pages
    
    //$pages = $this->getInforPages();

    //Solo las paginas del sitio (home,us,contact)
    //$dataPages = $this->pageService->getPages();
    //dd($dataPages);

    //TODO - Luego toca actualizar paginas

    //============================ Blog
    /**
     * Buscar alguna categoria , si ya existe para asociar los posts
     * o la informacion de la categoria ya viene en la data?
    */
    //$dataPosts = $this->blogService->getPosts();
    //dd($dataPosts);

    //TODO - Luego toca CREAR posts

    //============================ Slider
    /**
     * El slider principal ya existe
     * Se tendria que buscar si existe un slider para asociar los slides luego
    */
    //$dataSlides = $this->sliderService->getSlides();
    //dd($dataSlides);

    //TODO - Luego toca CREAR slides

    //============================ Icommerce
    /** 
     * la informacion de la categoria ya viene en la data?
    */
    //$dataProducts = $this->icommerceService->getProducts();
    //dd($dataSProducts);

    //TODO - Luego toca CREAR productos

        
    \Log::info($this->log."processAi|END");

  }


  /**
   * OJO
   */
  public function getInforPages()
  {

        \Log::info($this->log."getInforPages");
      
        $pages = app("Modules\Page\Repositories\PageRepository")->getItemsBy();

        $prompt = [];
        foreach ($pages as $key => $page) {
            \Log::info($this->log."PageTitle: ".$page->title);
            $data =  [
                'id' => $page->id,
                'title' => $page->title
            ];
            
            array_push($prompt,$page->title);
        }

        return $prompt;
       
  }

  

}