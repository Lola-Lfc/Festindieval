<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seriesindee;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Seriesindee::orderBy('nom')->get();

        return view('Admin.series.index', compact('series'));
    }

    public function create()
    {
        return view('Admin.series.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'lien' => 'nullable|url|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $validated['image'] = '/images/' . $filename;
        }

        Seriesindee::create($validated);

        return redirect()
            ->route('admin.series.index')
            ->with('success', 'Série créée avec succès.');
    }

    public function edit(Seriesindee $serie)
    {
        return view('Admin.series.edit', compact('serie'));
    }

    public function update(Request $request, Seriesindee $serie)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'lien' => 'nullable|url|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $validated['image'] = '/images/' . $filename;
        } else {
            unset($validated['image']);
        }

        $serie->update($validated);

        return redirect()
            ->route('admin.series.index')
            ->with('success', 'Série modifiée avec succès.');
    }

    public function destroy(Seriesindee $serie)
    {
        if ($serie->dons()->exists()) {
            return redirect()
                ->route('admin.series.index')
                ->with('error', 'Impossible de supprimer cette série car elle possède des dons.');
        }

        $serie->delete();

        return redirect()
            ->route('admin.series.index')
            ->with('success', 'Série supprimée avec succès.');
    }
}