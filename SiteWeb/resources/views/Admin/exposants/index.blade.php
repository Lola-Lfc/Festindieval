@extends('Admin.layouts.app')

@section('content')

<main class="admin-content admin-exposants">

<h1>Gestion des exposants</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('admin.exposants.create') }}">
    Ajouter un exposant
</a>

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
        @foreach ($exposants as $exposant)
            <tr>
                <td>{{ $exposant->nom }}</td>
                <td>{{ $exposant->activite }}</td>
                <td>{{ $exposant->tag?->nom }}</td>
                <td>
                    <a href="{{ route('admin.exposants.edit', $exposant) }}">
                        Modifier
                    </a>

                    <form method="POST"
                          action="{{ route('admin.exposants.destroy', $exposant) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</main>
@endsection