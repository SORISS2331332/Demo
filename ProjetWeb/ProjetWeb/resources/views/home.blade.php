@extends('default')

@section('registerTitle')
<title>Accueil</title>
@endsection

@section('home')
<div class="container mt-5">
    <div class="text-center">
        <p class="btn btn-success p-3">Bienvenue sur Sag Météo</p>
    </div>

    @if (Auth::check())
        <div class="alert alert-success text-center">Bonjour, vous êtes connecté.</div>
    @else
        <div class="alert alert-warning text-center">Vous n'êtes pas connecté. Vous devez vous connecter pour consulter les températures</div>
    @endif
</div>
@endsection
