@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one mb-0">@lang('lang.text_sharedFiles_edit_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('sharedFiles') }}" class="d-flex align-items-center btn btn-primary ms-2">
                    <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    @lang('lang.text_return_list_button')
                    </a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">@lang('lang.text_sharedFiles_edit_subtitle')</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group">
                                <label for="titre">@lang('lang.text_sharedFiles_create_form_title')</label>
                                <input type="text" name="titre" id="titre" class="form-control mt-2" value="@if(old('titre')) {{ old('titre') }} @else {{ $sharedFile->titre }} @endif">
                                @if($errors->has('titre'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('titre')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2" style="pointer-events:none;">
                                <label for="current-file">@lang('lang.text_sharedFiles_edit_form_current_file')</label>
                                <input type="text" name="current-file" id="current-file" class="form-control mt-2" value="{{ $sharedFile->file_path }}">
                            </div>
                            <div class="control-group mt-2">
                                <label for="body">@lang('lang.text_sharedFiles_edit_form_new_file')</label>
                                <input type="file" accept=".pdf, .zip, .doc, .docx" name="file" id="file" class="form-control mt-2">
                                @if($errors->has('file'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('file')}}</span>
                                @endif
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-3" value="@lang('lang.text_upload_button')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection