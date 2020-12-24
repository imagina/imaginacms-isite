<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class ItemList extends Component
{
  
  
  public $item;
  public $mediaImage;
  public $view;
  public $withViewMoreButton;
  public $viewMoreButtonLabel;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($item, $mediaImage = "mainimage", $layout = 'item-list-layout-1', $parentAttributes = null,
                              $withViewMoreButton = false, $viewMoreButtonLabel = "isite::common.menu.viewMore")
  {
    $this->item = $item;
    $this->mediaImage = $mediaImage;
    $this->view = "isite::frontend.components.item-list.layouts." . ($layout ?? 'item-list-layout-1' ) .".index";
    $this->withViewMoreButton = $withViewMoreButton;
    $this->viewMoreButtonLabel = $viewMoreButtonLabel;
    
    if(!empty($parentAttributes))
      $this->getParentAttributes($parentAttributes);
  }
  
  private function getParentAttributes($parentAttributes){
    
    isset($parentAttributes["mediaImage"]) ? $this->mediaImage = $parentAttributes["mediaImage"] : false;
    isset($parentAttributes["layout"]) ? $this->layout = $parentAttributes["layout"] : false;
    isset($parentAttributes["withViewMoreButton"]) ? $this->withViewMoreButton = $parentAttributes["withViewMoreButton"] : false;
    isset($parentAttributes["viewMoreButtonLabel"]) ? $this->viewMoreButtonLabel = $parentAttributes["viewMoreButtonLabel"] : false;
    
  }
  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render()
  {
    return view($this->view);
  }
}