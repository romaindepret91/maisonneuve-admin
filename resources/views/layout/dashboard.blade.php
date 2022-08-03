@extends('layout.admin')
@section('content')
    @if(session('success'))
        <h3 class="text-success px-5 py-5">{{ session('success')}} {{ $name }}</h3>
    @endif
@endsection