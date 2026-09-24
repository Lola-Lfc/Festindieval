@extends('Admin.layouts.app')

@section('content')

<main class="admin-typebillets">

    <h1>Modifier {{ $typebillet->nom }}</h1>

    @if ($errors->any())
        <div class="admin-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.typebillets.update', $typebillet) }}">

        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom</label>
            <input
                type="text"
                id="nom"
                name="nom"
                value="{{ old('nom', $typebillet->nom) }}"
                required
            >
        </div>

        <div>
            <label for="prix">Prix</label>
            <input
                type="number"
                id="prix"
                name="prix"
                value="{{ old('prix', $typebillet->prix) }}"
                min="0"
                step="0.01"
                required
            >
        </div>

        <div>
            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
            >{{ old('description', $typebillet->description) }}</textarea>
        </div>

        <button type="submit">Enregistrer</button>

        <a href="{{ route('admin.typebillets.index') }}">
            Annuler
        </a>

    </form>

</main>

@endsection