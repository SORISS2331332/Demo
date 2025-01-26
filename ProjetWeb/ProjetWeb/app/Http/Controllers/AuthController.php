<?php

namespace App\Http\Controllers;
use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AuthController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    }
    public function showLoginForm()
    {
        return view('connexion');
    }


    public function login(Request $request)
{
    // Validation des informations de connexion
    $request->validate([
        'email' => 'required|email',
        'motDePasse' => 'required|min:6',
    ]);

    $credentials = $request->only('email', 'motDePasse');
    $ip = $request->ip();

    // Vérifier si l'utilisateur est actuellement bloqué
    $tempsBlocage = Cache::get("login_lockout_{$ip}");
    if ($tempsBlocage && Carbon::parse($tempsBlocage)->isFuture()) {
        $tempsRestant = Carbon::parse($tempsBlocage)->diffInSeconds(Carbon::now());
        return back()->withErrors([
            'email' => "Trop de tentatives. Réessayez dans $tempsRestant secondes."
        ]);
    }

    $attempts = Cache::get("login_attempts_{$ip}", 0);

    if ($attempts >= 3) {
        Cache::put("login_lockout_{$ip}", Carbon::now()->addMinutes(1), 60);
        return back()->withErrors([
            'email' => 'Trop de tentatives échouées. Essayez à nouveau dans 1 minute.'
        ]);
    }

    $user = User::where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['motDePasse'], $user->motDePasse)) {
        Cache::forget("login_attempts_{$ip}");

        Auth::login($user);

        if ($user->role == 'Utilisateur') {
            return redirect('/temperature');
        } else {
            return redirect()->intended('/admin');
        }
    } else {
        Cache::put("login_attempts_{$ip}", $attempts + 1, 60); 

        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ]);
    }
}

    public function logout()
    {
        Auth::logout();
        return redirect('/'); 
    }

}
