@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">@lang('lang.text_blogposts_create_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('blogposts') }}" class="btn btn-primary">@lang('lang.text_return_list_button')</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">@lang('lang.text_blogposts_create_subtitle')</div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="row">
                            <div class="control-group">
                                <label for="blogpostTitle">@lang('lang.text_blogposts_create_blogpostTitle')</label>
                                <input type="text" name="blogpostTitle" id="blogpostTitle" class="form-control mt-2" value="{{ old('blogpostTitle')}}">
                                @if($errors->has('blogpostTitle'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('blogpostTitle')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2">
                                <label for="blogpostContent">@lang('lang.text_blogposts_create_blogpostContent')</label>
                                <textarea name="blogpostContent" id="blogpostContent" class="form-control mt-2" value="{{ old('blogpostContent')}}">
                                </textarea>
                                @if($errors->has('blogpostContent'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('blogpostContent')}}</span>
                                @endif
                            </div>
                            <div class="control-group mt-2">
                                <label for="lang">@lang('lang.text_blogposts_create_blogpostLang')</label>
                                <select name="lang" id="lang" class="form-control mt-2">
                                    <option value="" disabled selected>@lang('lang.text_blogposts_create_blogpostLang_placeholder')</option>
                                    <option>@lang('lang.text_blogposts_create_blogpostEng')</option>
                                    <option>@lang('lang.text_blogposts_create_blogpostFr')</option>
                                </select>
                                @if($errors->has('lang'))
                                    <span class="text-danger d-inline-block mt-1">{{ $errors->first('lang')}}</span>
                                @endif
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-3" value="@lang('lang.text_send_button')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection