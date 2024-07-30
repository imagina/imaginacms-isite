@if($captchaEnabled && $captchaEnabled == '1')
  <!--Template to reCaptcha v2-->
  @if($captchaVersion == '2')
    {!! app('icaptcha')->display($params) !!}
  @endif

  <!-- Added reCaptcha CDN-->
  @once
    @section('scripts-owl')
      @parent
      <script type="text/javascript" src="{{$jsApiUrl}}" async></script>
    @endsection
  @endonce

  <!-- Logic to handle the token -->
  @section('scripts-owl')
    @parent
    <script type="text/javascript">
      //Get the submit element
      const submitElement = $("#{{ $formId }} input[type=submit], #{{ $formId }} button[type=submit]");

      $(function () {
        //Disable the submit  button by default if it is the v2
        if ({{$captchaVersion}} == '2') disable{{ $formId }}Button();
        //Set the needed attributes in submit element to use v3
        else {
          submitElement.addClass("g-recaptcha");
          submitElement.attr('data-sitekey', "{{$captchaKey}}")
          submitElement.attr('data-action', "submit")
          submitElement.attr('data-callback', "onSubmit{{$formId}}Form");
        }
      });

      //Enable form button submit
      function enable{{ $formId }}Button(response) {
        if (response) submitElement.removeAttr('disabled');
      }

      //Disable
      function disable{{ $formId }}Button() {
        submitElement.attr('disabled', 'disabled');
      }

      //Handle onSubmit when v3
      function onSubmit{{$formId}}Form() {
        const form = $("#{{ $formId }}");
        //Validate form before submit
        if (form.get(0).checkValidity()) form.submit()
        else form.get(0).reportValidity()
      }
    </script>
  @stop
@endif
