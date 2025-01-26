@extends('default')
@section('AdminTitle')
<title>Admin</title>
@endsection
@section('admin')
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Administration <b>Utilisateur</b></h2>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>Role</th>
                        <th>Email</th>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($utilisateurs as $utilisateur)
                        @if ($utilisateur != Auth::User())
                        <tr>
                            <td>{{ $utilisateur->idUtilisateur }}</td>
                            <td>{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</td>
                            <td>{{ $utilisateur->role }}</td>
                            <td>{{ $utilisateur->email }}</td>
                            <td>{{ $utilisateur->adresse }}</td>
                            <td>
                                <form method="post" action="/admin2">
                                    @csrf
                                    <div class="d-flex">
                                        <select name="role" id="role">
                                            <option value="utilisateur">Utilisateur</option>
                                            <option value="admin">Admin</option>
                                            <option value="visiteur">Visiteur</option>
                                        </select>
                                        <button name="email" class="btn btn-primary btn-sm" value="{{ $utilisateur->email }}" type="submit">Envoyer</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="/admin">
                                    @csrf
                                    <button name="email" value="{{ $utilisateur->email }}" type="submit" class=" btn btn-danger btn-sm">Supprimer l'utilisateur</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
