<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class Button extends Component
{

  public $style;
  public $buttonClasses;
  public $onclick;
  public $withIcon;
  public $iconClass;
  public $withLabel;
  public $label;
  
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($style = "", $buttonClasses = "", $onclick="", $withIcon = false, $iconClass = "",
                              $withLabel = false, $label = "")
  {
    $this->style = $style;
    $this->buttonClasses = $buttonClasses;
    $this->onclick = $onclick;
    $this->withIcon = $withIcon;
    $this->iconClass = $iconClass;
    $this->withLabel = $withLabel;
    $this->label = $label;
   
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view("isite::frontend.components.button");
  }
}
