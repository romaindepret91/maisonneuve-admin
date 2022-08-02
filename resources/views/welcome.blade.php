@extends('layout.app')
@section('content')
    <main class="homepage">
        <div class="container-fluid">
            <div class="row justify-content-center flex-wrap bg-light">
                <img class="mt-5" src="assets/logo.png" alt="logo" style="width:400px">
                <h1 class="col-6 text-center py-5" style="width:100%">Portail Interface d'administration</h1>
            </div>
            <div class="row justify-content-center mt-5">
                <a class="col-2 btn btn-lg btn-primary rounded-pill m-3" href="{{ route('login')}}">Se connecter</a>
                <a class="col-2 btn btn-lg btn-primary rounded-pill m-3" href="{{ route('signup')}}">S'inscrire</a>
            </div>
        </div>
    </main>
@endsection

