<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invite;
use App\Models\Tag;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function index()
    {
        $invites = Invite::with('tag')->orderBy('nom')->get();

        return view('Admin.invites.index', compact('invites'));
    }

    public function create()
    {
        $tags = Tag::orderBy('nom')->get();

        return view('Admin.invites.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateInvite($request);

        if ($request->hasFile('pfp')) {
            $file = $request->file('pfp');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $validated['pfp'] = '/images/' . $filename;
        }

        Invite::create($validated);

        return redirect()
            ->route('admin.invites.index')
            ->with('success', 'Invité créé avec succès.');
    }

    public function edit(Invite $invite)
    {
        $tags = Tag::orderBy('nom')->get();

        return view('Admin.invites.edit', compact('invite', 'tags'));
    }

    public function update(Request $request, Invite $invite)
    {
        $validated = $this->validateInvite($request);

        if ($request->hasFile('pfp')) {
            $file = $request->file('pfp');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $validated['pfp'] = '/images/' . $filename;
        } else {
            unset($validated['pfp']);
        }

        $invite->update($validated);

        return redirect()
            ->route('admin.invites.index')
            ->with('success', 'Invité modifié avec succès.');
    }

    public function destroy(Invite $invite)
    {
        if ($invite->programmes()->exists()) {
            return redirect()
                ->route('admin.invites.index')
                ->with('error', 'Impossible de supprimer cet invité car il possède des programmes.');
        }

        $invite->delete();

        return redirect()
            ->route('admin.invites.index')
            ->with('success', 'Invité supprimé avec succès.');
    }

    private function validateInvite(Request $request): array
    {
        return $request->validate([
            'tag_id' => ['required', 'exists:tags,id'],
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'pfp' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
            'activite' => ['required', 'string'],
            'youtube' => ['nullable', 'url', 'max:2048'],
            'instagram' => ['nullable', 'url', 'max:2048'],
            'tiktok' => ['nullable', 'url', 'max:2048'],
            'site_web' => ['nullable', 'url', 'max:2048'],
        ]);
    }
}
