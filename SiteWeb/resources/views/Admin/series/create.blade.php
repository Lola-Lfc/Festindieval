@extends('Admin.layouts.app')

@section('content')

<main class="admin-series">

    <h1>Ajouter une série</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('admin.series.store') }}" enctype="multipart/form-data"
    >

        @csrf

        <div>
            <label for="nom">Nom</label>
            <input
                type="text"
                id="nom"
                name="nom"
                value="{{ old('nom') }}"
                required
            >
        </div>

        <div>
            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
                required
            >{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="image">Image</label>

            <input
                type="file"
                id="image"
                name="image"
                accept="image/jpeg,image/png,image/webp"
            >
        </div>

        <div>
            <label for="lien">Lien de la série</label>
            <input
                type="url"
                id="lien"
                name="lien"
                value="{{ old('lien') }}"
            >
        </div>

        <button type="submit">
            Ajouter
        </button>

        <a href="{{ route('admin.series.index') }}">
            Annuler
        </a>

    </form>

</main>

@endsection