@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one mb-0">@lang('lang.text_students_edit_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('etudiants') }}" class="d-flex align-items-center btn btn-primary ms-2">
                    <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    @lang('lang.text_return_list_button')
                    </a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">@lang('lang.text_students_edit_subtitle') #{{ $etudiant->id }}</div>
                <div class="card-body">
                    <form method="post">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="control-group">
                                <label for="title">@lang('lang.text_students_name')</label>
                                <input value="{{ $etudiant->etudiantHasUser->name }}" type="text" name="name" id="name" class="form-control mt-2">
                                @if($errors->has('name'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2">
                                <label for="email">@lang('lang.text_students_email')</label>
                                <input value="{{ $etudiant->etudiantHasUser->email }}" type="email" name="email" id="email" class="form-control mt-2">
                                @if($errors->has('email'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2">
                                <label for="password">@lang('lang.text_students_password')</label>
                                <input type="password" name="password" id="password" class="form-control mt-2" value="{{ old('password')}}">
                                @if($errors->has('password'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2">
                                <label for="adresse">@lang('lang.text_students_address')</label>
                                <input value="{{ $etudiant->adresse }}" type="text" name="adresse" id="adresse" class="form-control mt-2">
                                @if($errors->has('adresse'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('adresse')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2">
                                <label for="telephone">@lang('lang.text_students_phone')</label>
                                <input value="{{ $etudiant->telephone }}" type="tel" name="telephone" id="telephone" class="form-control mt-2">
                                @if($errors->has('telephone'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('telephone')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2">
                                <label for="dateNaissance">@lang('lang.text_students_birthday')</label>
                                <input value="{{ $etudiant->dateNaissance }}" type="date" name="dateNaissance" id="dateNaissance" class="form-control mt-2">
                                @if($errors->has('dateNaissance'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('dateNaissance')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2">
                                <label for="ville">@lang('lang.text_students_city')</label>
                                <select name="ville" id="ville" class="form-control mt-2">
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}" @if($ville->id === $etudiant->villes_id) selected @endif>{{ $ville->nom }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('ville'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('ville')}}</span>
                                @endif
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-3" value="@lang('lang.text_send_button')">
                                <a href="{{ route('etudiant.show', $etudiant->id) }}" class="btn btn-warning mt-3 ms-3">@lang('lang.text_cancel_button')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection