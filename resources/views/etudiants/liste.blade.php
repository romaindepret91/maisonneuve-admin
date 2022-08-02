@extends('layout.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-4">
            <div class="row align-items-center">
                <div class="col-8">
                    <h1 class="display-one">Liste des étudiants</h1>
                </div>
                <div class="col-4">
                    <a href="{{ route('etudiant.create') }}">
                        <span class="btn btn-primary">Ajouter un nouvel étudiant</span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#06295e" class="bi bi-plus-circle-fill ms-1" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg></span>
                    </a>
                </div>
            </div>
            <table class="table table-striped mt-3">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date de Naissance</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Fiche</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($etudiants as $etudiant)
                        <tr>
                            <th scope="row">{{ $etudiant->id }}</th>
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->adresse }}</td>
                            <td>{{ $etudiant->telephone }}</td>
                            <td>{{ $etudiant->email }}</td>
                            <td>{{ $etudiant->dateNaissance }}</td>
                            <td>
                                @forelse($villes as $ville)
                                    @if($ville->id === $etudiant->villes_id)
                                        {{ $ville->nom }}
                                    @endif
                                @empty
                                    Non renseigné
                                @endforelse
                            </td>
                            <td><a href="{{ route('etudiant.show', $etudiant->id) }}"><b>Voir Détails</b></a></td>
                        </tr>
                    @empty
                        <p class="text-warning">Aucun étudiant à afficher.</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection