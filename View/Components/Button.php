<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class Button extends Component
{

  public $idButton;
  public $style;
  public $buttonClasses;
  public $onclick;
  public $withIcon;
  public $iconClass;
  public $iconPosition;
  public $iconColor;
  public $withLabel;
  public $label;
  public $href;
  public $color;
  public $target;
  public $sizeLabel;
  public $dataItemId;
  public $dataTarget;
  public $classesBlock;
  public $buttonConfig;
  public $sizePadding;
  public $styleBlock;
  public $styleBlockHover;
  public $disabled;
  public $loadingLabel;
  public $loadingIcon;
  public $loading;
  
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($idButton = null, $style = "", $buttonClasses = "", $onclick="", $withIcon = false, $iconClass = "",
                              $withLabel = false, $label = "", $href = "",  $color="primary", $classesBlock = null, $sizePadding = "",
                              $target="", $iconPosition="left", $iconColor='currentcolor', $sizeLabel="16", $dataItemId="", $dataTarget=null,
                              $styleBlock = "", $styleBlockHover = "", $disabled = false, $loadingIcon="fa-duotone fa-spinner-third fa-spin",
                              $loading=false, $loadingLabel = null
  )
  {
    $this->idButton = $idButton ?? uniqid('button');
    $this->style = $style;
    $this->buttonClasses = $buttonClasses;
    $this->onclick = $onclick;
    $this->withIcon = $withIcon;
    $this->iconClass = $iconClass;
    $this->iconPosition = $iconPosition;
    $this->iconColor = $iconColor;
    $this->withLabel = $withLabel;
    $this->label = $label;
    $this->href = $href;
    $this->color = $color;
    $this->target = $target;
    $this->sizeLabel = $sizeLabel;
    $this->dataItemId =  $dataItemId;
    $this->dataTarget =  $dataTarget;
    if(isset($classesBlock)){
        $this->style = $this->buttonClasses;
        $this->buttonClasses = $buttonClasses.' '.$sizePadding.' '.$classesBlock;
    }
    $this->styleBlock =  $styleBlock;
    $this->styleBlockHover =  $styleBlockHover;
    $this->disabled =  $disabled;
    $this->activeLoading($loading,$loadingIcon,$loadingLabel);
  }

  public function activeLoading($loading,$icon,$label){
      if($loading) {
          $this->withIcon = true;
          $this->iconClass = $icon;
          $this->disabled =  true;
          if(!empty($label)) {
          $this->withLabel = true;
          $this->label = $label;
          }
      }
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
