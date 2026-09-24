<?php

namespace App\Http\Controllers;

use App\Models\Exposant;
use App\Models\Tag;
use App\Models\Exposant;
use App\Models\Tag;
use Illuminate\Http\Request;

class ExposantsController extends Controller
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
}