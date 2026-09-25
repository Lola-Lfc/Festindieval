@extends('Admin.layouts.app')

@section('content')

<main class="admin-series">

    <h1>Gestion des séries</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <a href="{{ route('admin.series.create') }}">
        Ajouter une série
    </a>

    <table>

        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Lien</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($series as $serie)

                <tr>

                    <td>
                        @if ($serie->image)
                            <img
                                src="{{ str_starts_with($serie->image, '/images/')
                                    ? asset($serie->image)
                                    : asset('storage/' . $serie->image) }}"
                                alt="{{ $serie->nom }}"
                                width="100"
                            >
                        @endif
                    </td>

                    <td>{{ $serie->nom }}</td>

                    <td>{{ $serie->description }}</td>

                    <td>
                        @if ($serie->lien)
                            <a href="{{ $serie->lien }}" target="_blank">
                                Voir
                            </a>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.series.edit', $serie) }}">
                            Modifier
                        </a>

                        <form method="POST" action="{{ route('admin.series.destroy', $serie) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <button class="danger-button" type="submit" onclick="return confirm('Supprimer cette série ?')">
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