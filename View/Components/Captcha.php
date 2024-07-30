<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class Captcha extends Component
{
  public $formId;
  public $captchaEnabled;
  public $captchaVersion;
  public $captchaKey;
  public $jsApiUrl;
  public $params;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($formId = "formsuscripcion", $params = [])
  {
    //Get keys
    $keysv2 = setting('isite::reCaptchaV2Site');
    $keysv3 = setting('isite::reCaptchaV3Site');

    //Instance the captcha key to use
    $this->captchaKey = $keysv3 ?? $keysv2;

    //Define the captcha version to use, with priority in the v3
    $this->captchaVersion = $keysv3 ? '3' : ($keysv2 ? '2' : null);

    //Intance the reCaptcha js api URL
    $this->jsApiUrl = "https://www.google.com/recaptcha/api.js";
    if ($this->captchaVersion == '3') $this->jsApiUrl .= "?render=$keysv3";

    $this->formId = $formId ?? "formsuscripcion";
    $this->captchaEnabled = setting('isite::activateCaptcha', null, '0');
    $this->params = array_merge($params ?? [], [
      'id' => 'captcha' . $this->formId,
      'data-sitekey' => $this->captchaKey,
      'data-callback' => "enable{$formId}Button",
      'data-expired-callback' => "disable{$formId}Button",
      'data-error-callback' => "disable{$formId}Button",
    ]);
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
