

@extends('default')
@section('registerTitle')
<title>Inscription</title>
@endsection
@section('connexion')

	<div class="R-container" id="container">
		<div class="form-container login-container">
		
			<form action="/register" method="post">
				@csrf
				<h1>Créer un compte</h1>
				<input type="text" name="prenom" placeholder="Prenom" value="{{ old('prenom') }}" required>
				<input type="text" name="nom" placeholder="Nom" value="{{ old('nom') }}" required>
				<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
				<input type="text" name="adresse" placeholder="Adresse" value="{{ old('adresse') }}" required>
				<input type="password" name="mdp" placeholder="Mot de passe" value="{{ old('mdp') }}" required>
				@if ($errors->any())
				<div>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
    			@endif
				<button type="submit">Créer le compte</button>
				
			</form>
		</div>
		
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<p class="tree"><img src="{{asset('img/th.jpg') }}" alt="IMG"></p>
					<button class="ghost" id="login"><a href="/connexion">Se connecter</a></button>
				</div>
			</div>
		</div>
	</div>
@endsection
