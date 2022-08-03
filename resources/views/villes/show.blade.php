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
    <a href="{{ route('villes') }}" class="btn btn-primary mt-4">@lang('lang.text_return_list_button')</a>
</div>
@endsection