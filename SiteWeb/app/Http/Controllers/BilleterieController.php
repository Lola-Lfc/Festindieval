<?php

namespace App\Http\Controllers;

use App\Models\Billets;
use App\Models\Typebillet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BilleterieController extends Controller
{
    public function index()
    {
        $typebillets = Typebillet::all();

        return view('billeterie', compact('typebillets'));
    }

    public function purchase(Request $request, Typebillet $typebillet): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        DB::transaction(function () use ($validated, $typebillet): void {
            for ($quantity = 0; $quantity < $validated['quantity']; $quantity++) {
                Billets::create([
                    'user_id' => auth()->id(),
                    'type_id' => $typebillet->id,
                    'date_achat' => now(),
                ]);
            }
        });

        $label = $validated['quantity'] > 1 ? 'billets' : 'billet';

        return redirect()
            ->route('billeterie')
            ->with('success', 'Votre achat de ' . $validated['quantity'] . ' ' . $label . ' a été confirmé.');
    }
}