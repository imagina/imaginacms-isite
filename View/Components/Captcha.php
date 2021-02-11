<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;
use Modules\Setting\Entities\Setting;

class Captcha extends Component
{

  public $formContainer;
  public $size;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($formContainer  = "formsuscripcion", $size = "invisible")
  {
    $this->formContainer = $formContainer ?? "formsuscripcion";
    $this->size = $size ?? "invisible";
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view("isite::frontend.components.captcha");
  }
}
