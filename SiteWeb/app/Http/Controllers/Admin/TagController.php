<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('nom')->get();

        return view('Admin.tags.index', compact('tags'));
    }
    public function create()
    {
        return view('Admin.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:tags,nom',
        ]);

        Tag::create($validated);

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Tag créé avec succès.');
    }

    public function edit(Tag $tag)
    {
        return view('Admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:tags,nom,' . $tag->id,
        ]);

        $tag->update($validated);

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Tag modifié avec succès.');
    }
    public function destroy(Tag $tag)
    {
        if ($tag->invites()->exists() || $tag->exposants()->exists()) {
            return redirect()
                ->route('admin.tags.index')
                ->with('error', 'Impossible de supprimer ce tag car il est utilisé.');
        }

        $tag->delete();

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Tag supprimé avec succès.');
    }
}