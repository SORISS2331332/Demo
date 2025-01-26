@extends('default')

@section('registerTitle')
<title>Contact</title>
@endsection

@section('contact')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="display-4">Contactez-nous</h1>
        <p class="lead">Nous serions ravis de recevoir vos questions ou commentaires. Remplissez le formulaire ci-dessous pour nous contacter.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Formulaire de contact</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="d-flex flex-column align-items-center">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Votre nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Votre email" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" class="form-control" id="message" rows="5" placeholder="Votre message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Envoyer le message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
