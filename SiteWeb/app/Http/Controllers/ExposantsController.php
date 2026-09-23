<?php

namespace App\Http\Controllers;

use App\Models\Exposant;

class ExposantsController extends Controller
{
    public function index()
    {
        $exposants = Exposant::all();

        return view('exposants', compact('exposants'));
    }
}