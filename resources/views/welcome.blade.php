@extends('layout.app')
@section('content')
    
<div class="row justify-content-center mt-5">
    <a class="col-2 btn btn-lg btn-primary rounded-pill m-3" href="{{ route('login')}}">@lang('lang.text_loggin_button')</a>
    <a class="col-2 btn btn-lg btn-primary rounded-pill m-3" href="{{ route('signup')}}">@lang('lang.text_signup_button')</a>
</div>
     
@endsection

