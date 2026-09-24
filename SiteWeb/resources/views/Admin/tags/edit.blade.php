@extends('Admin.layouts.app')

@section('content')

<main class="admin-tags">

    <h1>Modifier {{ $tag->nom }}</h1>

    @if ($errors->any())
        <div class="admin-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.tags.update', $tag) }}">

        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom</label>

            <input
                type="text"
                id="nom"
                name="nom"
                value="{{ old('nom', $tag->nom) }}"
                required
            >
        </div>

        <button type="submit">Enregistrer</button>

        <a href="{{ route('admin.tags.index') }}">
            Annuler
        </a>

    </form>

</main>

@endsection