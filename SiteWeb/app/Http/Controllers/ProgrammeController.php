<?php

namespace App\Http\Controllers;

use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::with('invite')
            ->orderBy('jour')
            ->orderBy('dt_heure_debut')
            ->get()
            ->groupBy('jour');

        return view('programme', compact('programmes'));
    }
}