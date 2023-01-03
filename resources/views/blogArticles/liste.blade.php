@extends('layout.admin')
@section('content')
@php $sessionUserId = Auth::user()->id; @endphp
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-10 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one mb-0">@lang('lang.text_blogposts_list_title')</h1>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('blogArticles.create') }}">
                        <span class="btn btn-primary">@lang('lang.text_blogposts_list_add')</span>
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
            <div class="row mt-4">
                @forelse($blogposts as $blogpost)
                    <article class="blog-post mt-4">
                        <h2 class="blog-post-title mb-1">@if($blogpost->titre) {{ $blogpost->titre }} @else <i>@lang('lang.text_blogposts_list_no_translation')</i> @endif</h2>
                        <p class="blog-post-meta mt-2">@lang('lang.text_blogposts_list_published') {{ $blogpost->created_at->format('j M Y') }} @lang('lang.text_blogposts_list_by') <a href="{{ route('etudiant.show', $blogpost->etudiants_id) }}">{{ $blogpost->name }}</a></p>
                        <p>@if($blogpost->body) {{ $blogpost->body }} @else <i>@lang('lang.text_blogposts_list_no_translation')</i> @endif</p>
                        @if($sessionUserId == $blogpost->users_id)
                            <div class="d-flex">
                                <a href="{{ route('blogpost.edit', $blogpost->blogpost_id) }}" class="card-link btn btn-outline-primary me-3">@lang('lang.text_update_button')</a>
                                <form action="blogArticles/{{ $blogpost->blogpost_id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="card-link btn btn-danger">@lang('lang.text_delete_button')</button>
                                </form>
                            </div>
                        @endif
                        <hr>
                        <p class="blog-post-meta mt-2">@lang('lang.text_blogposts_list_modified') {{ $blogpost->updated_at->format('j M Y') }}</p>
                    </article>
                @empty
                        <p class="text-warning">@lang('lang.text_blogposts_list_empty')</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection