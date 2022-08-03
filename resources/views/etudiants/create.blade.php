@extends('layout.admin')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-12 pt-5">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">Ajout d'un étudiant</h1>
                </div>
                <div class="col-4">
                    <a href="{{ route('etudiants') }}" class="btn btn-outline-primary">Retourner à la liste</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Nouvel Étudiant</div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="row">
                            <div class="control-group">
                                <label for="title">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control mt-2">
                            </div>
                            <div class="control-group mt-2">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" id="adresse" class="form-control mt-2">
                            </div>
                            <div class="control-group mt-2">
                                <label for="telephone">Téléphone</label>
                                <input type="tel" name="telephone" id="telephone" class="form-control mt-2">
                            </div>
                            <div class="control-group mt-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control mt-2">
                            </div>
                            <div class="control-group mt-2">
                                <label for="dateNaissance">Date de naissance</label>
                                <input type="date" name="dateNaissance" id="dateNaissance" class="form-control mt-2">
                            </div>
                            <div class="control-group mt-2">
                                <label for="villes">Ville</label>
                                <select name="villes" id="villes" class="form-control mt-2">
                                    <option value="" disabled selected>Sélectionner une ville...</option>
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection