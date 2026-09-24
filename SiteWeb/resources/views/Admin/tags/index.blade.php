@extends('Admin.layouts.app')

@section('content')

<main class="admin-tags">

    <h1>Gestion des tags</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <a href="{{ route('admin.tags.create') }}">
        Ajouter un tag
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($tags as $tag)

                <tr>
                    <td>{{ $tag->id }}</td>

                    <td>{{ $tag->nom }}</td>

                    <td>
                        <a href="{{ route('admin.tags.edit', $tag) }}">
                            Modifier
                        </a>

                        <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Supprimer ce tag ?')">
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