@extends('layout.app')
@section('content')

<main class="signup-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="card">
                    <h3 class="card-header text-center">Créer un compte</h3>
                    <div class="card-body">
                        <form action="{{ route('custom.signup')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nom" name="name" class="form-control" value="{{ old('name')}}">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" placeholder="Courriel" name="email" class="form-control" value="{{ old('email')}}">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Mot de passe" name="password" class="form-control">
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Adresse" name="adresse" class="form-control" value="{{ old('adresse')}}">
                                @if($errors->has('adresse'))
                                    <span class="text-danger">{{ $errors->first('adresse')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="tel" placeholder="Téléphone" name="telephone" class="form-control" value="{{ old('telephone')}}">
                                @if($errors->has('telephone'))
                                    <span class="text-danger">{{ $errors->first('telephone')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" placeholder="Date de naissance" style="color:#6e757c;" name="dateNaissance" class="form-control" value="{{ old('dateNaissance')}}">
                                @if($errors->has('dateNaissance'))
                                    <span class="text-danger">{{ $errors->first('dateNaissance')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <select placeholder="Ville" style="color:#6e757c;" name="ville" id="ville" class="form-control">
                                <option value="" disabled selected>Ville</option>
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('ville'))
                                    <span class="text-danger">{{ $errors->first('ville')}}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </form> 
                    </div>
                </div>
                <div class="form-text mt-3 ms-1"><a href="{{ route('login')}}" class="link-unstyled">Déjà Membre? Connectez-vous ici!</a></div>
            </div>
        </div>
    </div>
</main>

@endsection
