@extends('Admin.layouts.app')

@section('content')

<main class="admin-series">

    <h1>Modifier {{ $serie->nom }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('admin.series.update', $serie) }}" enctype="multipart/form-data">
        

        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom</label>
            <input
                type="text"
                id="nom"
                name="nom"
                value="{{ old('nom', $serie->nom) }}"
                required
            >
        </div>

        <div>
            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
                required
            >{{ old('description', $serie->description) }}</textarea>
        </div>

        <div>
            <label for="image">Nouvelle image</label>

            @if ($serie->image)
                <img
                    src="{{ str_starts_with($serie->image, '/images/')
                        ? asset($serie->image)
                        : asset('storage/' . $serie->image) }}"
                    alt="{{ $serie->nom }}"
                    width="150"
                >
            @endif

            <input
                type="file"
                id="image"
                name="image"
                accept="image/jpeg,image/png,image/webp"
            >

            <small>Laisser vide pour conserver l'image actuelle.</small>
        </div>

        <div>
            <label for="lien">Lien</label>
            <input
                type="url"
                id="lien"
                name="lien"
                value="{{ old('lien', $serie->lien) }}"
            >
        </div>

        <button type="submit">
            Enregistrer
        </button>

        <a href="{{ route('admin.series.index') }}">
            Annuler
        </a>

    </form>

</main>

@endsection