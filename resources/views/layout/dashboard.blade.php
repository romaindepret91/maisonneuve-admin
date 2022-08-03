@extends('layout.admin')
@section('content')
    @if(session('success'))
        <span class="text-success">{{ session('success')}} {{ $name }}</span>
    @endif
@endsection