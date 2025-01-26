@extends('default')

@section('registerTitle')
<title>À propos de nous</title>
@endsection

@section('about')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="display-4">À propos de Sag Météo</h1>
        <p class="lead">Découvrez qui nous sommes et ce que nous faisons pour vous fournir les meilleures informations météo.</p>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center">
                    <h4>Notre Mission</h4>
                </div>
                <div class="card-body">
                    <p class="lead">Chez **Sag Météo**, notre mission est de fournir des informations météorologiques précises et fiables à nos utilisateurs. Nous nous engageons à rendre la météo plus accessible pour tous, partout, à tout moment.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center">
                    <h4>Notre Équipe</h4>
                </div>
                <div class="card-body">
                    <p class="lead">Notre équipe est composée de passionnés de météo et de technologie. Nous avons des experts en prévisions météorologiques, des ingénieurs en données, ainsi que des designers et des développeurs web qui travaillent ensemble pour offrir la meilleure expérience utilisateur.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center">
                    <h4>Pourquoi choisir Sag Météo ?</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle"></i> Prévisions fiables et actualisées en temps réel</li>
                        <li><i class="fas fa-check-circle"></i> Interface intuitive et facile à utiliser</li>
                        <li><i class="fas fa-check-circle"></i> Accessible depuis tous vos appareils</li>
                        <li><i class="fas fa-check-circle"></i> Support client réactif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
