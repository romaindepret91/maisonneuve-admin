@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-12 pt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-one">@lang('lang.text_cities_show_title')</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="display-one text-muted">@lang('lang.text_cities_show_subtitle') #{{ $ville->id }}</h4>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">{{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mt-3" style="width: 30rem;">
        <div class="card-body bg-light">
            <h5 class="card-title">{{ $ville->nom }}</h5>
        </div>
        <div class="card-body d-flex">
            <a href="{{ route('ville.edit', $ville->id) }}" class="card-link btn btn-outline-primary">@lang('lang.text_update_button')</a>
            <form method="POST" class="ms-3">
                @csrf
                @method('DELETE')
                <button class="card-link btn btn-danger">@lang('lang.text_delete_button')</a>
            </form>
        </div>
    </div>
    <div class="col-4 d-flex align-items-center mt-4">
        <a href="{{ route('villes') }}" class="d-flex align-items-center btn btn-primary">
            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
            @lang('lang.text_return_list_button')
        </a>
    </div>
</div>
@endsection