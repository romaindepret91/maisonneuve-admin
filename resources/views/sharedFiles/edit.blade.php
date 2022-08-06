@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">@lang('lang.text_sharedFiles_edit_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('sharedFiles') }}" class="btn btn-primary">@lang('lang.text_return_list_button')</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">@lang('lang.text_sharedFiles_edit_subtitle')</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group">
                                <label for="titre">@lang('lang.text_blogposts_create_blogpostTitle')</label>
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