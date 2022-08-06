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
@php $locale = session()->get('locale'); @endphp
<main class="homepage">
    <div class="content w-100">
        <ul class="nav justify-content-end align-items-center bg-light py-2 pe-5">
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link active px-1 text-secondary @if($locale=='fr') text-decoration-underline fw-bolder @endif" href="{{ route('lang', 'fr') }}">@lang('lang.text_fr')</a>
                <span>/</span>
                <a class="nav-link active px-1 text-secondary @if($locale=='en' || empty($locale)) text-decoration-underline fw-bolder @endif" href="{{ route('lang', 'en') }}">@lang('lang.text_eng')</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center flex-wrap bg-light">
            <img class="mt-1" src="assets/logo.png" alt="logo" style="width:400px">
            <h1 class="col-6 text-center py-5" style="width:100%">@lang('lang.text_welcome_page_title')</h1>
        </div>
    </div>
</main>
 
@yield('content')
</body>
</html>