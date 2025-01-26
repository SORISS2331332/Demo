<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\PrevisionController;
use App\Http\Controllers\ControllerRegister;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;





Route::get('/register', function () {
    return view('register');
});






Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});



// Utiliser le middleware personnalisé
// Route GET pour afficher le formulaire de connexion (sans le middleware 'check.login.attempts')
Route::middleware('guest')->get('connexion', [AuthController::class, 'showLoginForm'])->name('connexion');

// Route POST pour traiter la connexion (sans le middleware 'check.login.attempts')
Route::middleware('guest')->post('connexion', [AuthController::class, 'login']);
Route::get('/temperature', [TemperatureController::class, 'index']);

Route::middleware('auth')->group (function () {
    Route::get('/', function(){
        return view('home');
    })->name('home');
    Route::get('/prevision', [PrevisionController::class, 'index']);
});
Route::get('/about', function(){
    return view('about');
})->name('about');
Route::get('/contact', function(){
    return view('contact');
})->name('contact');
Route::post('/deconnexion', [AuthController::class, 'logout'])->name('logout');

Route::get('/connexionAction', function () {
    return view('register');
});
Route::get('/newregister', function () {
    return view('newregister');
});
Route::post('/register', [ControllerRegister::class, 'submitForm']);

Route::get('/admin', [UserController::class, 'index']);

Route::post('/admin', [UserController::class, 'deleteUser']);

Route::post('/admin2', [UserController::class, 'changeRole']);


Route::post('/connexion', [AuthController::class, 'login']);

