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
        $validated = $this->validateExposant($request);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $validated['logo'] = '/images/' . $filename;
        }

        Exposant::create($validated);

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
        $validated = $this->validateExposant($request);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $validated['logo'] = '/images/' . $filename;
        } else {
            unset($validated['logo']);
        }

        $exposant->update($validated);

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
            'logo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
            'site_web' => ['nullable', 'url', 'max:2048'],
            'reseaux' => ['nullable', 'url', 'max:2048'],
        ]);
    }
}
