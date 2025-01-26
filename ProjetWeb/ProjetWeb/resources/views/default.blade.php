<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    @yield('registerTitle')
    @yield('ConnexionTitle')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styleR.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <div class="logo">Sag Météo</div>
            <ul class="navbar-nav ms-auto">
            @if (!Auth::check())
                <li class="nav-item"><a class="me-4 btn btn-outline-success fw-bold" href="/">Accueil</a></li>
            @endif
                @if (Auth::check())
                
                @endif
                <li class="nav-item"><a class="me-4 btn btn-outline-success fw-bold" href="/temperature">Températures</a></li>
                <li class="nav-item"><a class="me-4 btn btn-outline-success fw-bold" href="/contact">Contact</a></li>
                <li class="nav-item"><a class="me-4 btn btn-outline-success fw-bold" href="/about">A Propos</a></li>
            </ul>
            
            @if (Auth::check())
                <form class="Deconn" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger fw-bold">Déconnexion</button>
                </form>
                <div class="profil ms-3">
                    <a href="/"><img class="profil-img" src="{{ asset('img/OIP.jpg') }}" alt="Profil"></a>
                </div>
            @else 
                <div class="Conn"><a href="/connexion" class="btn btn-success fw-bold">Se Connecter</a></div>
            @endif
        </div>
    </nav>

    <div class="content">
        @yield('home')
        @yield('connexion')
        @yield('register')
        @yield('temperature')
        @yield('contact')
        @yield('about')

        @yield('prevision')

        @yield('admin')

    </div>

    <footer>
        <small>&copy; 2024 Sag Météo inc. Tous droits réservés.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
