@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-12 pt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-one">@lang('lang.text_students_show_title')</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="display-one text-muted">@lang('lang.text_students_show_subtitle') #{{ $etudiant->id }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3" style="width: 30rem;">
        <div class="card-body bg-light">
            <h5 class="card-title">{{ $etudiant->etudiantHasUser->name }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center">
                <span class="me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                </span>
                {{ $etudiant->adresse }}
            </li>
            <li class="list-group-item d-flex align-items-center">
                <span class="me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                </span>
                {{ $etudiant->telephone }}
            </li>
            <li class="list-group-item d-flex align-items-center">
                <span class="me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                </span>
                {{ $etudiant->etudiantHasUser->email }}
            </li>
            <li class="list-group-item d-flex align-items-center">
                <span class="me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                     <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </span>
                {{ $etudiant->dateNaissance }}
            </li>
            <li class="list-group-item d-flex align-items-center">
                <span class="me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                </span>
                {{ $ville->nom }}
            </li>
        </ul>
        <div class="card-body d-flex">
            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="card-link btn btn-outline-primary">@lang('lang.text_update_button')</a>
            <form method="POST" class="ms-3">
                @csrf
                @method('DELETE')
                <button class="card-link btn btn-danger">@lang('lang.text_delete_button')</a>
            </form>
        </div>
    </div>
    <a href="{{ route('etudiants') }}" class="btn btn-primary mt-4">@lang('lang.text_return_list_button')</a>
</div>
@endsection