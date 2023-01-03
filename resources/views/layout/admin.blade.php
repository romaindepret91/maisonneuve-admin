<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
</head>

<body>
@php 
$locale = session()->get('locale'); 
$username = Auth::user()->name;
@endphp
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pb-3 w-25">
            <nav class="navbar bg-light navbar-light p-3">
                <a href="#" class="navbar-brand mx-4 mb-3 w-100">
                    <img class="mt-5" src="{{asset('assets/logo.png')}}" alt="logo" style="width:250px">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('assets/profile-picture.png')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ $username }}</h6>
                    </div>
                </div>
                <div class="navbar-nav nav-pills w-100 ms-4 mt-3">
                    <h5 class="nav-item nav-header active">@lang('lang.text_dashboard')</h5>
                    <a href="{{ route('etudiants') }}" class="nav-item nav-link">@lang('lang.text_students')</a>
                    <a href="{{ route('villes') }}" class="nav-item nav-link">@lang('lang.text_cities')</a>
                    <a href="{{ route('blogposts.index') }}" class="nav-item nav-link">@lang('lang.text_forum')</a>
                    <a href="{{ route('sharedFiles') }}" class="nav-item nav-link">@lang('lang.text_sharedFiles')</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content w-75">
            <ul class="nav justify-content-end align-items-center bg-light py-2 pe-5">
                <li class="nav-item d-flex align-items-center me-5">
                    <span class="nav-link disabled pe-1">@lang('lang.text_loggedin')</span>
                    <span> / </span>
                    <a class="nav-link px-1 text-dark" href="{{ route('logout') }}">@lang('lang.text_logout')</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link active px-1 text-secondary @if($locale=='fr') text-decoration-underline fw-bolder @endif" href="{{ route('lang', 'fr') }}">@lang('lang.text_fr')</a>
                    <span>/</span>
                    <a class="nav-link active px-1 text-secondary @if($locale=='en' || empty($locale)) text-decoration-underline fw-bolder @endif" href="{{ route('lang', 'en') }}">@lang('lang.text_eng')</a>
                </li>
            </ul>
            @yield('content')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-light btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>