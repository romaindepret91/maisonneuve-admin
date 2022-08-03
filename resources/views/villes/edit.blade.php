@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">@lang('lang.text_cities_edit_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('villes') }}" class="btn btn-primary">@lang('lang.text_return_list_button')</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">@lang('lang.text_cities_edit_subtitle') #{{ $ville->id }}</div>
                <div class="card-body">
                    <form method="post">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="control-group">
                                <label for="title">@lang('lang.text_cities_name')</label>
                                <input value="{{ $ville->nom }}" type="text" name="nom" id="nom" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-3" value="@lang('lang.text_send_button')">
                                <a href="{{ route('ville.show', $ville->id) }}" class="btn btn-warning mt-3 ms-3">@lang('lang.text_cancel_button')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection