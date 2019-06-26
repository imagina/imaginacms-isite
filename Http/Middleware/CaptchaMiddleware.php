<?php

namespace Modules\Isite\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Mockery\CountValidator\Exception;

class CaptchaMiddleware extends BaseApiController
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */


  public function __construct(){}


  public function handle(Request $request, Closure $next)
  {
    try {
      //Get data
      $data = (object)$request->input('attributes');
      if(isset($data->captcha)){
        $dataCaptcha = (object)$data->captcha;
        if(isset($dataCaptcha->version) && isset($dataCaptcha->token)){
          $version = $dataCaptcha->version;//Get version of catpcha
          $token = $dataCaptcha->token;//Get token f captcha

          //Define keys according to version of captcha
          $secret  = ($version) == 3 ? env('CAPTCHA_SECRET') : env('CAPTCHA_SECRET_CHECKBOX');
          $sitekey  = ($version) == 3 ? env('CAPTCHA_SITE') : env('CAPTCHA_SITE_CHECKBOX');

          //Define class captcha
          $captcha = new \Anhskohbo\NoCaptcha\NoCaptcha($secret, $sitekey);
          $isValid = $captcha->verifyResponse($token);//Validate token captcha
          if(!$isValid)
            throw new Exception();
        }
      }
    } catch (\Exception $error) {
      $response = ["errors" => 'Invalid Captcha'];
      return response($response, Response::HTTP_UNAUTHORIZED);
    }

    return $next($request);
  }
}
