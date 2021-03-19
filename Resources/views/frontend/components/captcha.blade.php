@php
    $captchaActivate = setting('isite::activateCaptcha')
@endphp
@if($captchaActivate)
    {!! app('captcha')->display(['data-sitekey' => setting('isite::reCaptchaV2Site')]) !!}
@endif
