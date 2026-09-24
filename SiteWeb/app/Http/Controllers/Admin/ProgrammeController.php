<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invite;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::with('invite')
            ->orderBy('jour')
            ->orderBy('dt_heure_debut')
            ->get();

        return view('Admin.programmes.index', compact('programmes'));
    }

    public function create()
    {
        $invites = Invite::orderBy('nom')->get();

        return view('Admin.programmes.create', compact('invites'));
    }

    public function store(Request $request)
    {
        Programme::create($this->validateProgramme($request));

        return redirect()
            ->route('admin.programmes.index')
            ->with('success', 'Programme créé avec succès.');
    }

    public function edit(Programme $programme)
    {
        $invites = Invite::orderBy('nom')->get();

        return view('Admin.programmes.edit', compact('programme', 'invites'));
    }

    public function update(Request $request, Programme $programme)
    {
        $programme->update($this->validateProgramme($request));

        return redirect()
            ->route('admin.programmes.index')
            ->with('success', 'Programme modifié avec succès.');
    }

    public function destroy(Programme $programme)
    {
        $programme->delete();

        return redirect()
            ->route('admin.programmes.index')
            ->with('success', 'Programme supprimé avec succès.');
    }

    private function validateProgramme(Request $request): array
    {
        return $request->validate([
            'invite_id' => ['required', 'exists:invites,id'],
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'dt_heure_debut' => ['required', 'date'],
            'dt_heure_fin' => ['required', 'date', 'after:dt_heure_debut'],
            'jour' => ['required', 'integer', 'min:1'],
        ]);
    }
}
