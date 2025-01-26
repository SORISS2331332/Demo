<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	@yield('registerTitle')
    @yield('ConnexionTitle')
	<link rel="stylesheet" href="{{asset('css/styleR.css') }}" />
	<link rel="stylesheet" href="{{asset('css/app.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
        <nav class="navbar">
            <div class="logo">Sag Météo</div>
            <ul class="nav-links">
                <li><a href="/">Accueil</a></li>
                <li><a href="/temperature">Temperatures</a></li>
            </ul>
            @if (Auth::check()) 
                <form class="Deconn" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" >Déconnexion</button>
                </form>
                <div class="profil">
                    <a class="profil-img" href="/"><img src="{{ asset('img/OIP.jpg') }}" alt="Profil"></a>
                </div>
            @else 
                <div class="Conn"><a href="/connexion">Se Connecter</a></div>
            @endif

                
            
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
        @yield('connexion')
        @yield('register')
        @yield('home')
        @yield('temperature')
        @yield('admin')
        
        @yield('bootstrap')
    <footer>
    
        <div>
            <small>&copy; 2024 Sag Météo inc. Tous droits réservés.</small>
        </div>
    </footer>
    <link rel="stylesheet" href="{{asset('js/app.js') }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>