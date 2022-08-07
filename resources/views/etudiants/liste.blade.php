@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-12 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one mb-0">@lang('lang.text_students_list_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('etudiant.create') }}">
                        <span class="btn btn-primary">@lang('lang.text_students_list_add')</span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#06295e" class="bi bi-plus-circle-fill ms-1" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg></span>
                    </a>
                </div>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">{{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-striped mt-4">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">@lang('lang.text_students_id')</th>
                        <th scope="col">@lang('lang.text_students_name')</th>
                        <th scope="col">@lang('lang.text_students_address')</th>
                        <th scope="col">@lang('lang.text_students_phone')</th>
                        <th scope="col">@lang('lang.text_students_email')</th>
                        <th scope="col">@lang('lang.text_students_birthday')</th>
                        <th scope="col">@lang('lang.text_students_city')</th>
                        <th scope="col">@lang('lang.text_students_list_card')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($etudiants as $etudiant)
                        <tr>
                            <th scope="row">{{ $etudiant->id }}</th>
                            <td>{{ $etudiant->etudiantHasUser->name }}</td>
                            <td>{{ $etudiant->adresse }}</td>
                            <td>{{ $etudiant->telephone }}</td>
                            <td>{{ $etudiant->etudiantHasUser->email }}</td>
                            <td>{{ $etudiant->dateNaissance }}</td>
                            <td>{{ $etudiant->etudiantHasVille->nom }}</td>
                            <td><a href="{{ route('etudiant.show', $etudiant->id) }}"><b>@lang('lang.text_students_list_details')</b></a></td>
                        </tr>
                    @empty
                        <p class="text-warning">@lang('lang.text_students_list_empty_list')</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection