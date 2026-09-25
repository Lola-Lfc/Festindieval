@extends('Admin.layouts.app')

@section('content')

<main class="admin-typebillets">

    <h1>Gestion des types de billets</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <a href="{{ route('admin.typebillets.create') }}">
        Ajouter un type de billet
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($typebillets as $typebillet)

                <tr>
                    <td>{{ $typebillet->id }}</td>
                    <td>{{ $typebillet->nom }}</td>
                    <td>{{ number_format($typebillet->prix, 2, ',', ' ') }} €</td>
                    <td>{{ $typebillet->description }}</td>

                    <td>
                        <a href="{{ route('admin.typebillets.edit', $typebillet) }}">
                            Modifier
                        </a>

                        <form method="POST" action="{{ route('admin.typebillets.destroy', $typebillet) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <button class="danger-button" type="submit" onclick="return confirm('Supprimer ce type de billet ?')">
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