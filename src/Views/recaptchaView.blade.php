<script src='https://www.google.com/recaptcha/api.js?hl={{config('Recaptcha.lang')}}'></script>
<div class="g-recaptcha {{$params['position']}}" data-sitekey="{{$params['public_key']}}"></div>
@if($errors->any())
    {!! $errors->first('g-recaptcha-response','<span class="text-danger">:message</span>') !!}
@endif