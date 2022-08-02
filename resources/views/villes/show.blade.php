@extends('layout.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-one">Fiche Détaillée</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="display-one text-muted">Ville #{{ $ville->id }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3" style="width: 30rem;">
        <div class="card-body bg-light">
            <h5 class="card-title">{{ $ville->nom }}</h5>
        </div>
        <div class="card-body d-flex">
            <a href="{{ route('ville.edit', $ville->id) }}" class="card-link btn btn-outline-primary">Modifier</a>
            <form method="POST" class="ms-3">
                @csrf
                @method('DELETE')
                <button class="card-link btn btn-outline-primary">Supprimer</a>
            </form>
        </div>
    </div>
    <a href="{{ route('villes') }}" class="btn btn-outline-primary mt-4">Retourner à la liste</a>
</div>
@endsection