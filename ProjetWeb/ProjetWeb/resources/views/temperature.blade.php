@extends('default')

@section('registerTitle')
<title>Températures</title>
@endsection

@section('temperature')
<div class="container mt-5">
    <div class="text-center mb-4">
        <p class="btn btn-success p-3">Bienvenue sur Sag Météo</p>
        <h1 class="display-4">Températures Par Ville</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Ville</th>
                    <th>Température (°C)</th>
                    <th>Date et Heure</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($temperatures as $temperature)
                {   
                    echo("<tr>
                    <td>$temperature->ville</td>
                    <td>$temperature->temperature °C</td>
                    <td>$temperature->date</td>
                </tr>");
                }
                ?>
                
            </tbody>
        </table>
    </div>
    @if(Auth::check())
        <div><a class="me-4 btn btn-outline-success fw-bold" href="/prevision">Voir détails</a></div>
    @else
        <div class="alert alert-warning text-center">Vous devez vous connecter pour consulter plus de températures</div>
    @endif
</div>
@endsection
