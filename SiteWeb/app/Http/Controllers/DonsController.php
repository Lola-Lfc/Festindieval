<?php

namespace App\Http\Controllers;

use App\Models\Don;
use App\Models\Seriesindee;
use Illuminate\Http\Request;

class DonsController extends Controller
{
    public function store(Request $request, Seriesindee $serie)
    {
        $validated = $request->validate([
            'montant' => 'required|numeric|min:1',
        ]);

        Don::create([
            'user_id' => auth()->id(),
            'serie_id' => $serie->id,
            'montant' => $validated['montant'],
            'date_don' => now(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Merci pour votre don de ' . number_format($validated['montant'], 2, ',', ' ') . ' € !');
    }
}