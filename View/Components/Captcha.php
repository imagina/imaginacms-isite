<?php

namespace Modules\Isite\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Modules\Setting\Entities\Setting;

class Captcha extends Component
{

  public $formContainer;
  public $params;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($formContainer  = "formsuscripcion", $params = [])
  {
    $this->formContainer = $formContainer ?? "formsuscripcion";
    $this->params = array_merge($params ?? [], ['data-sitekey' => setting('isite::reCaptchaV2Site')]);
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
