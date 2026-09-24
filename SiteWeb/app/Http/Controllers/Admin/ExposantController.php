<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exposant;
use App\Models\Tag;
use Illuminate\Http\Request;

class ExposantController extends Controller
{
    public function index()
    {
        $exposants = Exposant::with('tag')->get();

        return view('Admin.exposants.index', compact('exposants'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('Admin.exposants.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tag_id' => 'required|exists:tags,id',
            'nom' => 'required|string',
            'description' => 'required|string',
            'activite' => 'required|string',
            'logo' => 'nullable|string',
            'site_web' => 'nullable|string',
            'reseaux' => 'nullable|string',
        ]);

        Exposant::create($validated);

        return redirect()
            ->route('admin.exposants.index')
            ->with('success', 'Exposant ajouté avec succès.');
    }

    public function edit(Exposant $exposant)
    {
        $tags = Tag::all();

        return view('Admin.exposants.edit', compact('exposant', 'tags'));
    }

    public function update(Request $request, Exposant $exposant)
    {
        $validated = $request->validate([
            'tag_id' => 'required|exists:tags,id',
            'nom' => 'required|string',
            'description' => 'required|string',
            'activite' => 'required|string',
            'logo' => 'nullable|string',
            'site_web' => 'nullable|string',
            'reseaux' => 'nullable|string',
        ]);

        $exposant->update($validated);

        return redirect()
            ->route('admin.exposants.index')
            ->with('success', 'Exposant modifié avec succès.');
    }

    public function destroy(Exposant $exposant)
    {
        $exposant->delete();

        return redirect()
            ->route('admin.exposants.index')
            ->with('success', 'Exposant supprimé avec succès.');
    }
}
