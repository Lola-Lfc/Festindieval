@extends('Admin.layouts.app')

@section('content')
<main class="admin-content">
    <h1>Gestion des invités</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <a href="{{ route('admin.invites.create') }}">Ajouter un invité</a>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Activité</th>
                <th>Tag</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invites as $invite)
                <tr>
                    <td>{{ $invite->nom }}</td>
                    <td>{{ $invite->activite }}</td>
                    <td>{{ $invite->tag?->nom }}</td>
                    <td>
                        <a href="{{ route('admin.invites.edit', $invite) }}">Modifier</a>
                        <form method="POST" action="{{ route('admin.invites.destroy', $invite) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer cet invité ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Aucun invité enregistré.</td></tr>
            @endforelse
        </tbody>
    </table>
</main>
@endsection