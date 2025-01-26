<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temperature;

class PrevisionController extends Controller
{
    public function index()
    {
        $temperatures = Temperature::all();
        return view('prevision', compact('temperatures'));
    }
}
