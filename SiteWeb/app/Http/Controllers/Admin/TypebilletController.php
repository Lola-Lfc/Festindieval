<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Typebillet;
use Illuminate\Http\Request;

class TypebilletController extends Controller
{
    public function index()
    {
        $typebillets = Typebillet::orderBy('prix')->get();

        return view('Admin.typebillets.index', compact('typebillets'));
    }
    
    public function create()
    {
        return view('Admin.typebillets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Typebillet::create($validated);

        return redirect()
            ->route('admin.typebillets.index')
            ->with('success', 'Type de billet créé avec succès.');
    }

    public function edit(Typebillet $typebillet)
    {
        return view('Admin.typebillets.edit', compact('typebillet'));
    }

    public function update(Request $request, Typebillet $typebillet)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $typebillet->update($validated);

        return redirect()
            ->route('admin.typebillets.index')
            ->with('success', 'Type de billet modifié avec succès.');
    }

    public function destroy(Typebillet $typebillet)
    {
        if ($typebillet->billets()->exists()) {
            return redirect()
                ->route('admin.typebillets.index')
                ->with('error', 'Impossible de supprimer ce type de billet car des billets utilisent déjà ce type.');
        }

        $typebillet->delete();

        return redirect()
            ->route('admin.typebillets.index')
            ->with('success', 'Type de billet supprimé avec succès.');
    }
}