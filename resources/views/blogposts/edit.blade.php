@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one mb-0">@lang('lang.text_blogposts_edit_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('blogposts') }}" class="d-flex align-items-center btn btn-primary ms-2">
                    <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    @lang('lang.text_return_list_button')
                    </a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">@lang('lang.text_blogposts_edit_subtitle') #{{ $blogpost->id }}</div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group"  style="@if(!empty($lang)) opacity:.5; pointer-event:none;@endif" >
                                <label for="lang">@lang('lang.text_blogposts_create_blogpostLang')</label>
                                <select name="lang" id="lang" class="form-control mt-2">
                                    @if(empty($lang))
                                        <option value="" disabled selected>@lang('lang.text_blogposts_create_blogpostLang_placeholder')</option>
                                    @endif
                                    <option value="en" @if(!empty($lang) and $lang=='en') selected @endif>@lang('lang.text_blogposts_create_blogpostEng')</option>
                                    <option value="fr" @if(!empty($lang) and $lang=='fr') selected @endif>@lang('lang.text_blogposts_create_blogpostFr')</option>
                                </select>
                                @if($errors->has('lang'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('lang')}}</span>
                                @endif
                            </div>
                            @if(!empty($lang))
                                <div class="control-group mt-2">
                                    <label for="titre">@lang('lang.text_blogposts_create_blogpostTitle')</label>
                                    <input type="text" name="titre" id="titre" class="form-control mt-2" value="@if(old('titre')) {{old('titre')}} @elseif($lang=='fr') {{$blogpost->titre_fr}} @elseif($lang=='en') {{$blogpost->titre}} @endif">
                                    @if($errors->has('titre'))
                                        <span class="text-danger d-inline-block mt-1">{{ $errors->first('titre')}}</span>
                                    @endif
                                </div>
                                <div class="control-group mt-2">
                                    <label for="body">@lang('lang.text_blogposts_create_blogpostContent')</label>
                                    <textarea name="body" id="body" class="form-control mt-2">@if(old('body')) {{old('body')}} @elseif($lang=='fr') {{$blogpost->body_fr}} @elseif($lang=='en') {{$blogpost->body}} @endif</textarea>
                                    @if($errors->has('body'))
                                        <span class="text-danger d-inline-block mt-1">{{ $errors->first('body')}}</span>
                                    @endif
                                </div>
                            @endif
                            <div class="control-group">
                                @if(!empty($lang))
                                    <a href="{{ route('blogpost.edit', $blogpost->id) }}" class="btn btn-warning mt-3 me-3">@lang('lang.text_back_button')</a>
                                @endif
                                <input type="submit" class="btn @if(empty($lang)) btn-warning @else btn-success @endif mt-3" value="@if(empty($lang)) @lang('lang.text_next_button') @else @lang('lang.text_send_button') @endif">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection