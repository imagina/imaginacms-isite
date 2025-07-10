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
      const formElement{{$formId}} = $("#{{ $formId }}");
      let submitElement{{$formId}} = $("#{{ $formId }} input[type=submit], #{{ $formId }} button[type=submit]");

      $(function () {
        //Disable the submit  button by default if it is the v2
        if ({{$captchaVersion}} == '2') disable{{ $formId }}Button();
        //Set the needed attributes in submit element to use v3
        else {
          // Hook the submit action for reCAPTCHA v3
          submitElement{{$formId}}.on('click', function (e) {
            e.preventDefault();
            grecaptcha.ready(function () {
              grecaptcha.execute("{{ $captchaKey }}", { action: 'submit' }).then(function (token) {
                // Append token to form
                formElement{{$formId}}.find('input[name="g-recaptcha-response"]').remove(); // prevent duplicates
                formElement{{$formId}}.append(`<input type="hidden" name="g-recaptcha-response" value="${token}">`);

                // Validate and submit
                if (formElement{{$formId}}.get(0).checkValidity()) formElement{{$formId}}.submit();
                else formElement{{$formId}}.get(0).reportValidity();
              });
            });
          });

          console.info(`[Captcha] v3 click handler attached for form: {{$formId}}`);
        }
      });

      //Enable form button submit
      function enable{{ $formId }}Button(response) {
        if (response) submitElement{{$formId}}.removeAttr('disabled');
      }

      //Disable
      function disable{{ $formId }}Button() {
        submitElement{{$formId}}.attr('disabled', 'disabled');
      }

      //Handle onSubmit when v3
      function onSubmit{{$formId}}Form() {
        const form = $("#{{ $formId }}");
        //Validate form before submit
        if (form.get(0).checkValidity()) form.trigger('submit');
        else form.get(0).reportValidity()
      }
    </script>
  @stop
@endif
