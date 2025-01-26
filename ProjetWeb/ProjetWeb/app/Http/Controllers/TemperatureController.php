<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temperature;

class TemperatureController extends Controller
{
    public function index()
    {
        $temperatures = Temperature::orderBy('id', 'desc')->take(10)->get();
        return view('temperature', compact('temperatures'));
    }
}
