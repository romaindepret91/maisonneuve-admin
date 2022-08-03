<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pb-3 w-25">
            <nav class="navbar bg-light navbar-light p-3">
                <a href="." class="navbar-brand mx-4 mb-3 w-100">
                    <h4 class="text-primary">Collège de Maisonneuve</h4>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('assets/profile-picture.png')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Administrateur</h6>
                    </div>
                </div>
                <div class="navbar-nav nav-pills w-100 ms-4 mt-3">
                    <h5 class="nav-item nav-header active">Tableau de bord</h5>
                    <a href="{{ route('etudiants') }}" class="nav-item nav-link">Étudiants</a>
                    <a href="{{ route('villes') }}" class="nav-item nav-link">Villes</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content w-75">
            <ul class="nav justify-content-end align-items-center bg-light py-2">
                <li class="nav-item d-flex">
                    <a class="nav-link active px-1" href="#">Fr /</a>
                    <a class="nav-link active px-1" href="#">Ang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Se déconnecter</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link disabled">Connecté</span>
                </li>
            </ul>
            @yield('content')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-light btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>