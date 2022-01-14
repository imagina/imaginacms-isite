<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;
use Modules\Media\Entities\File;
use Modules\Setting\Entities\Setting;

class ItemTabs extends Component
{
  public $tabs;
  public $classes;
  public $categoryId;
  public $title;
  public $subtitle;
  public $componentParams;
  public $componentResponsive;
  public $componentRepository;
  public $componentEntity;
  public $componentMargin;
  public $componentItemsBySlide;
  public $componentEntityName;
  public $componentShowTitle;
  public $componentConfigLayoutIndex;
  public $componentItemComponentAttributes;
  public $componentNavText;
  public $componentModuleName;
  public $componentFilter;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($tabs = [], $categoryId, $classes = null, $componentUse = 'item-list',
                              $title = null, $subtitle = null, $componentParams = null,
                              $componentRepository = 'Modules\Iblog\Repositories\PostRepository',
                              $componentResponsive = '[0 => ["items" =>  2],640 => ["items" => 2],992 => ["items" => 4]]',
                              $componentEntity = 'Modules\Iblog\Entities\Category', $componentMargin = '10',
                              $componentItemsBySlide = '1', $componentEntityName = 'Post', $componentShowTitle = 'false',
                              $componentConfigLayoutIndex = 'config("asgard.isite.config.layoutIndexItemTabs")',
                              $componentItemComponentAttributes = 'config("asgard.isite.config.indexItemListAttributesItemTabs")',
                              $componentNavText = '["<i class=\"fa fa-angle-left\'></i>","<i class=\"fa fa fa-angle-right\"></i>"]',
                              $componentModuleName = 'Iblog', $componentFilter = 'category')
  {
    $this->tabs = $tabs ?? setting('isite::itemsTabs');
    $this->categoryId = $categoryId;
    $this->componentUse = $componentUse ?? 'item-list';
    $this->title = $title;
    $this->subtitle = $subtitle;
    $this->componentParams = $componentParams;
    $this->componentResponsive = $componentResponsive ?? '[0 => ["items" =>  2],640 => ["items" => 2],992 => ["items" => 4]]';
    $this->componentRepository = $componentRepository ?? 'Modules\Iblog\Repositories\PostRepository';
    $this->componentEntity = $componentEntity ?? 'Modules\Iblog\Entities\Category';
    $this->componentMargin = $componentMargin ?? '10';
    $this->componentItemsBySlide = $componentItemsBySlide ?? '1';
    $this->componentEntityName = $componentEntityName ?? 'Post';
    $this->componentShowTitle = $componentShowTitle ?? 'false';
    $this->componentConfigLayoutIndex = $componentConfigLayoutIndex ?? 'config("asgard.isite.config.layoutIndexItemTabs")';
    $this->componentItemComponentAttributes = $componentItemComponentAttributes ?? 'config("asgard.isite.config.indexItemListAttributesItemTabs")';
    $this->componentNavText = $componentNavText ?? '["<i class=\"fa fa-angle-left\'></i>","<i class=\"fa fa fa-angle-right\"></i>"]';
    $this->componentModuleName = $componentModuleName ?? 'Iblog';
    $this->componentFilter = $componentFilter ?? 'category';
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public
  function render()
  {
    return view("isite::frontend.components.item-tabs.layouts.item-tabs-layout-1.item-tabs-layout-1");
  }
}


