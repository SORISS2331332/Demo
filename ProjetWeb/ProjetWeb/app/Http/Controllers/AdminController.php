<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Méthode qui sera exécutée lorsqu'on accède à /admin
    public function index()
    {
        return view('admin'); // Retourne la vue admin
    }
}
