@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">@lang('lang.text_cities_list_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('ville.create') }}">
                        <span class="btn btn-primary">@lang('lang.text_cities_list_add')</span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#06295e" class="bi bi-plus-circle-fill ms-1" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg></span>
                    </a>
                </div>
            </div>
            <table class="table table-striped mt-3">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">@lang('lang.text_cities_id')</th>
                        <th scope="col">@lang('lang.text_cities_name')</th>
                        <th scope="col">@lang('lang.text_cities_list_card')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($villes as $ville)
                        <tr>
                            <th scope="row">{{ $ville->id }}</th>
                            <td>{{ $ville->nom }}</td>
                            <td><a href="{{ route('ville.show', $ville->id) }}"><b>@lang('lang.text_cities_list_details')</b></a></td>
                        </tr>
                    @empty
                        <p class="text-warning">@lang('lang.text_cities_list_empty_list')</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection