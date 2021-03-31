@if($captchaEnabled)
    {!! app('icaptcha')->display($params) !!}
@endif
@once
@section('scripts-owl')
    @parent
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
@stop
@endonce
