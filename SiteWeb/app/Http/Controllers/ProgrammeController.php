<?php

namespace App\Http\Controllers;

use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::all();

        return view('programme', compact('programmes'));
    }
}