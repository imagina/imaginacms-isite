<?php

namespace Modules\Isite\View\Components\ItemList;

use Illuminate\View\Component;

class ItemList extends Component
{
  
  
  public $item;
  public $mediaImage;
  public $view;
  
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($item, $mediaImage = "mainimage", $layout = 'item-list-layout-1', $parentAttributes = null)
  {
    $this->item = $item;
    $this->mediaImage = $mediaImage;
    $this->view = "isite::frontend.components.item-list.layouts." . ($layout ?? 'item-list-layout-1' ) .".index";

    if(!empty($parentAttributes))
      $this->getParentAttributes($parentAttributes);
  }
  
  private function getParentAttributes($parentAttributes){
    
    isset($parentAttributes["mediaImage"]) ? $this->mediaImage = $parentAttributes["mediaImage"] : false;
    isset($parentAttributes["layout"]) ? $this->layout = $parentAttributes["layout"] : false;
    
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