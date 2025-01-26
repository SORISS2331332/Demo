<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerRegister extends Controller
{

    public function submitForm(RegisterRequest $request)
    {
        // Process validated data
        $validated = $request->validated();

        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        // Hash le mot de passe, Laravel hash les mots de passes et stocke le sel, pas besoin de stocker le sel dans la db
        $mdp = $_POST['mdp'];
        $mdp = Hash::make($mdp);

        $users = DB::select('select * from Utilisateurs where email = :email', ['email' => $email]);

        if ($users == null || $users == 0)
        {
            DB::insert('insert into Utilisateurs (email, motDePasse, nom, prenom, adresse) values(?,?,?,?,?)', [$email, $mdp, $nom, $prenom, $adresse]);
        }
        else{
            return back()->withErrors([
                'email' => 'L\'email existe déjà',
            ]);
        }


        return view('connexion');
    }
}
