@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">@lang('lang.text_blogposts_list_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('blogpost.create') }}">
                        <span class="btn btn-primary">@lang('lang.text_blogposts_list_add')</span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#06295e" class="bi bi-plus-circle-fill ms-1" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg></span>
                    </a>
                </div>
            </div>
            <div class="row mt-5">
                <article class="blog-post">
                    <h2 class="blog-post-title mb-1">Sample blog post</h2>
                    <p class="blog-post-meta mt-2">January 1, 2021 by <a href="#">Mark</a></p>
                    <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, lists, tables, images, code, and more are all supported as expected.</p>
                    <hr>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection