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
        $exposants = Exposant::with('tag')->orderBy('nom')->get();

        return view('Admin.exposants.index', compact('exposants'));
    }

    public function create()
    {
        $tags = Tag::orderBy('nom')->get();

        return view('Admin.exposants.create', compact('tags'));
    }

    public function store(Request $request)
    {
        Exposant::create($this->validateExposant($request));

        return redirect()->route('admin.exposants.index')
            ->with('success', 'Exposant créé avec succès.');
    }

    public function edit(Exposant $exposant)
    {
        $tags = Tag::orderBy('nom')->get();

        return view('Admin.exposants.edit', compact('exposant', 'tags'));
    }

    public function update(Request $request, Exposant $exposant)
    {
        $exposant->update($this->validateExposant($request));

        return redirect()->route('admin.exposants.index')
            ->with('success', 'Exposant modifié avec succès.');
    }

    public function destroy(Exposant $exposant)
    {
        $exposant->delete();

        return redirect()->route('admin.exposants.index')
            ->with('success', 'Exposant supprimé avec succès.');
    }

    private function validateExposant(Request $request): array
    {
        return $request->validate([
            'tag_id' => ['required', 'exists:tags,id'],
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'activite' => ['required', 'string'],
            'logo' => ['nullable', 'string', 'max:2048'],
            'site_web' => ['nullable', 'url', 'max:2048'],
            'reseaux' => ['nullable', 'url', 'max:2048'],
        ]);
    }
}
