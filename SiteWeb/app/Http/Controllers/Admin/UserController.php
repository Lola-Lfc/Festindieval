<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('Admin.users.index', compact('users'));
    }
    public function create()
{
    return view('Admin.users.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'role' => 'required|in:user,admin',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => $validated['role'],
    ]);

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Utilisateur créé avec succès.');
}

public function edit(User $user)
{
    return view('Admin.users.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:user,admin',
        'password' => 'nullable|min:8',
    ]);

    if (
        $user->role === 'admin' &&
        $validated['role'] !== 'admin' &&
        User::where('role', 'admin')->count() <= 1
    ) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Impossible de retirer le rôle du dernier administrateur.');
    }

    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->role = $validated['role'];

    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    $user->save();

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Utilisateur modifié avec succès.');
}

public function destroy(User $user)
{
    if (auth()->id() === $user->id) {
        return redirect()
            ->route('admin.users.index')
            ->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
    }

    if ($user->role === 'admin') {
        $adminCount = User::where('role', 'admin')->count();

        if ($adminCount <= 1) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Impossible de supprimer le dernier administrateur.');
        }
    }

    $user->delete();

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Utilisateur supprimé avec succès.');
}

}