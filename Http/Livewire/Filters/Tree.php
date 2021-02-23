<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;
use Illuminate\Http\Request;
use Modules\Icommerce\Entities\Category;
use Modules\Icommerce\Repositories\CategoryRepository;

class Tree extends Component
{
  /*
* Attributes From Config
*/
  public $title;
  public $name;
  public $status;
  public $isExpanded;
  public $type;
  public $repository;
  public $emitTo;
  public $repoAction;
  public $repoAttribute;
  public $repoMethod;
  public $listener;
  public $layout;
  public $classes;
  public $mode;
  public $entityClass;
  public $params;
  
  
  protected $breadcrumb;
  public $typeTitle;
  public $items;
  public $configs;
  public $itemSelected;
  
  public $extraParamsUrl;
  
  protected $listeners = ['updateExtraParams'];
  
  public function mount(  $title, $name, $type, $repository, $entityClass, $emitTo, $repoAction, $repoAttribute, $listener,
                          $repoMethod = "getItemsBy", $params = [], $layout='range-layout-1', $itemSelected = null,
                          $typeTitle = "configTitle", $classes='col-12', $status=true, $isExpanded=true,
                          $breadcrumb = [], $mode = "allTree")
  {
    $this->title = trans($title);
    $this->name = $name;
    $this->status = $status;
    $this->isExpanded = $isExpanded;
    $this->type = $type;
    $this->repository = $repository;
    $this->entityClass = $entityClass;
    $this->emitTo = $emitTo;
    $this->repoAction = $repoAction;
    $this->repoAttribute = $repoAttribute;
    $this->repoMethod = $repoMethod ?? "getItemsBy";
    $this->listener = $listener;
    $this->layout = $layout;
    $this->classes = $classes;
    $this->mode = $mode;
    $this->params = $params;
 
    
    $this->breadcrumb = $breadcrumb;
    $this->extraParamsUrl = "";
    
    $this->itemSelected = $itemSelected;
    $this->typeTitle = $typeTitle;
  
    if($this->typeTitle=="itemSelected" && isset($this->itemSelected))
      $this->title = $this->itemSelected->title ?? $this->itemSelected->name ?? $this->title;

    
    $this->initConfigs();
  }
  
  
  /*
  * Init Configs to ProductList
  *
  */
  public function initConfigs(){
    
    $this->configs = config("asgard.icommerce.config.filters.categories");
    
  }
  
  public function updateExtraParams($params)
  {
    $this->extraParamsUrl = $params;
  }
  
  private function getRepository()
  {
    return app($this->repository);
  }
  
  public function render()
  {
    
    $tpl = 'isite::frontend.livewire.filters.tree.index';
    $ttpl = 'isite.livewire.filters.tree.index';
    
    $params = json_decode(json_encode([
      "include" => ['translations'],
      "take" => 0,
      "filter" => $this->params["filter"] ?? []
    ]));
    
    
    $this->items = $this->getRepository()->{$this->repoMethod}($params);
    
    if (view()->exists($ttpl)) $tpl = $ttpl;
    
    // Reorganize collection by the 'mode' config
    if (isset($this->itemSelected->id) && $this->mode) {
      switch ($this->mode) {
        case 'allFamilyOfTheSelectedNode':
          $ancestors = $this->entityClass::ancestorsAndSelf($this->itemSelected->id);
          $rootItem = $ancestors->whereNull('parent_id')->first();
          $this->items = $this->entityClass::descendantsAndSelf($rootItem->id);
          break;
    
        case 'onlyLeftAndRightOfTheSelectedNode':
          $ancestors = $this->entityClass::ancestorsOf($this->itemSelected->id);
          $descendants = $result = $this->entityClass::descendantsAndSelf($this->itemSelected->id);
          $siblings = $this->itemSelected->getSiblings();
          $this->items = $ancestors->merge($descendants)->merge($siblings);
          break;
      }
    }
    
    return view($tpl,["breadcrumb" => $this->breadcrumb]);

  }
  

  

  
}