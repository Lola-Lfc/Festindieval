@extends('Admin.layouts.app')

@section('content')
<main class="admin-content">
    <h1>Gestion du programme</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.programmes.create') }}">Ajouter un événement</a>

    <table>
        <thead>
            <tr>
                <th>Jour</th>
                <th>Horaire</th>
                <th>Nom</th>
                <th>Invité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($programmes as $programme)
                <tr>
                    <td>{{ $programme->jour }}</td>
                    <td>{{ \Carbon\Carbon::parse($programme->dt_heure_debut)->format('d/m/Y H:i') }} - {{ \Carbon\Carbon::parse($programme->dt_heure_fin)->format('H:i') }}</td>
                    <td>{{ $programme->nom }}</td>
                    <td>{{ $programme->invite?->nom }}</td>
                    <td>
                        <a href="{{ route('admin.programmes.edit', $programme) }}">Modifier</a>
                        <form method="POST" action="{{ route('admin.programmes.destroy', $programme) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer cet événement ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Aucun événement enregistré.</td></tr>
            @endforelse
        </tbody>
    </table>
</main>
@endsection