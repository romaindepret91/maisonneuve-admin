@extends('layout.admin')
@section('content')
@php $sessionUserId = Auth::user()->id; @endphp
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">@lang('lang.text_sharedFiles_liste_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('sharedFile.create') }}">
                        <span class="btn btn-primary">@lang('lang.test_sharedFiles_liste_add')</span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#06295e" class="bi bi-plus-circle-fill ms-1" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg></span>
                    </a>
                </div>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row mt-5">
                <ul class="list-group">
                @forelse($sharedFiles as $sharedFile)
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>{{ $sharedFile->titre }}</span>
                        @if($sharedFile->sharedFileHasEtudiant->etudiantHasUser->id == $sessionUserId)
                            <div class="d-flex">
                                <a href="{{ route('sharedFile.download', $sharedFile->id) }}" class="card-link btn btn-success">@lang('lang.text_download_button')</a>
                                <a href="{{ route('sharedFile.edit', $sharedFile->id) }}" class="card-link btn btn-outline-primary ms-3">@lang('lang.text_update_button')</a>
                                <form action="sharedFiles/{{ $sharedFile->id }}" method="POST" class="ms-3">
                                    @csrf
                                    @method('DELETE')
                                    <button class="card-link btn btn-danger">@lang('lang.text_delete_button')</a>
                                </form>
                            </div>
                        @else 
                            <a href="{{ route('sharedFile.download', $sharedFile->id) }}" class="card-link btn btn-success">@lang('lang.text_download_button')</a>
                        @endif
                    </li>
                @empty
                    <p class="text-warning">@lang('lang.test_sharedFiles_liste_empty')</p>
                @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection