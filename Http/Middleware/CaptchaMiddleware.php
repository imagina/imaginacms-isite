<?php

namespace Modules\Isite\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Mockery\CountValidator\Exception;
use Modules\Setting\Contracts\Setting;

class CaptchaMiddleware extends BaseApiController
{
  private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }


  public function handle(Request $request, Closure $next)
  {
    try {
      $activateCaptcha = $this->setting->get('isite::activateCaptcha');
      if($activateCaptcha) {
        //Get data
        $data = $request->all();

        //Verify if exist attributes and set $data
        if(isset($data['attributes'])) {
          $data = $data['attributes'];
        }

        //Verify if exist captcha or g-recaptcha-response
        if (isset($data["captcha"]) || isset($data["g-recaptcha-response"])) {
          //Take tokens
          $token = $data["captcha"]["token"] ?? $data["g-recaptcha-response"];

          //Verify if exist token
          if($token) {
            //Define keys according to version of captcha
            $secret = setting('isite::reCaptchaV2Secret') ?? setting('isite::reCaptchaV3Secret');
            $sitekey = setting('isite::reCaptchaV2Site') ?? setting('isite::reCaptchaV3Site');

            $captcha = new \Anhskohbo\NoCaptcha\NoCaptcha($secret, $sitekey);
            $isValid = $captcha->verifyResponse($token);//Validate token captcha
            if (!$isValid) throw new Exception();
          }
        } else throw new Exception();
      }
    } catch (\Exception $error) {
      \Log::info($error->getMessage().' '.$error->getFile().' '.$error->getLine());
      $response = ["errors" => json_encode(["invalidCaptcha" => [trans("isite::sites.messages.invalidCaptcha")]])];
      return response($response, 400);
    }

    return $next($request);
  }
}
