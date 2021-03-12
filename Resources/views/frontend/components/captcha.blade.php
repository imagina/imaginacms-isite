@php
    $captchaActivate = setting('isite::activateCaptcha')
@endphp
@if($captchaActivate)

@endif
@once
@section('scripts-owl')
    <script>
      function callbackCaptchaSubscription(form, response){

      }
    </script>
@stop
@endonce
