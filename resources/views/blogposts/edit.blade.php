@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">@lang('lang.text_blogposts_edit_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('blogposts') }}" class="btn btn-primary">@lang('lang.text_return_list_button')</a>
                </div>
            </div>
            <div class="card mt-3">
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