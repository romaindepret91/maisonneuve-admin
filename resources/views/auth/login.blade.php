@extends('layout.app')
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="card">
                    <h3 class="card-header text-center">@lang('lang.text_login_title')</h3>
                    <div class="card-body">
                        @if($errors and !$errors->has('email') and !$errors->has('password'))
                            @foreach($errors->all() as $error)
                            <span class="text-danger d-inline-block mb-2 ">{{ $error }}</span>
                            @endforeach
                        @endif
                        <form action="{{ route('custom.login')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" placeholder="@lang('lang.text_login_form_email')" name="email" class="form-control">
                                @if($errors->has('email'))
                                    <span class="text-danger d-inline-block mt-2">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="@lang('lang.text_login_form_password')" name="password" class="form-control">
                                @if($errors->has('password'))
                                    <span class="text-danger d-inline-block mt-2">{{ $errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary">@lang('lang.text_loggin_button')</button>
                            </div>
                        </form> 
                    </div>
                </div>
                <div class="form-text mt-3 ms-1"><a href="{{ route('signup')}}" class="link-unstyled">@lang('lang.text_login_not_member')</a></div>
            </div>
        </div>
    </div>
</main>

@endsection
