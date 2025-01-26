@extends('default')

@section('ConnexionTitle')
<title>Connexion</title>
@endsection

@section('connexion')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h1>Se connecter</h1>
                </div>
                <div class="card-body">
                    <form action="{{ url('connexion') }}" method="POST" class="d-flex flex-column align-items-center">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-center">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
						</div>

						<div class="mb-3">
							<label for="motDePasse" class="form-label">Mot de passe</label>
							<input name="motDePasse" type="password" class="form-control" id="motDePasse" placeholder="Mot de passe" required>
						</div>




                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                        </div>
                    </form>

                    @if(session('error'))
                        <div class="alert alert-danger mt-3 text-center">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <p>Vous n'avez pas de compte ? <a href="/register">Créer un compte</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
