@extends('layout.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-4">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">Modification d'une ville</h1>
                </div>
                <div class="col-4">
                    <a href="{{ route('villes') }}" class="btn btn-outline-primary">Retourner à la liste</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Ville #{{ $ville->id }}</div>
                <div class="card-body">
                    <form method="post">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="control-group">
                                <label for="title">Nom</label>
                                <input value="{{ $ville->nom }}" type="text" name="nom" id="nom" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-3">
                                <a href="{{ route('ville.show', $ville->id) }}" class="btn btn-primary mt-3 ms-3">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection