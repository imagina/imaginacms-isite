<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class PrintButton extends Component
{

  public $containerId;
  public $icon;
  public $text;
  public $containerName;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($containerId = "page-wrapper", $icon = "fa fa-print", $text= "Imprimir")
  {
    $this->containerId = $containerId ?? 'page-wrapper';
    $this->icon = $icon ?? "fa fa-print";
    $this->text = $text ?? "Imprimir";
    $this->containerName = str_replace('#','_',$this->containerId);
    $this->containerName = str_replace('.','_',$this->containerName);
    $this->containerName = str_replace(',','_',$this->containerName);
    $this->containerName = str_replace('-','_',$this->containerName);
    $this->containerName = str_replace(' ','_',$this->containerName);
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view("isite::frontend.components.print-button");
  }
}
