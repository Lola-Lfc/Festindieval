@extends('Admin.layouts.app')

@section('content')

<main class="admin-content admin-exposants">

<h1>Modifier l'exposant {{ $exposant->nom }}</h1>

@if ($errors->any())
    <ul class="admin-errors">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST"
      action="{{ route('admin.exposants.update', $exposant) }}">

    @csrf
    @method('PUT')

    <label for="nom">Nom</label>
    <input
        type="text"
        name="nom"
        id="nom"
        value="{{ old('nom', $exposant->nom) }}"
        required
    >

    <label for="description">Description</label>
    <textarea
        name="description"
        id="description"
        required
    >{{ old('description', $exposant->description) }}</textarea>

    <label for="activite">Activité</label>
    <input
        type="text"
        name="activite"
        id="activite"
        value="{{ old('activite', $exposant->activite) }}"
        required
    >

    <label for="tag_id">Tag</label>
    <select name="tag_id" id="tag_id" required>
        @foreach ($tags as $tag)
            <option
                value="{{ $tag->id }}"
                @selected(old('tag_id', $exposant->tag_id) == $tag->id)
            >
                {{ $tag->nom }}
            </option>
        @endforeach
    </select>

    <label for="logo">Logo</label>
    <input
        type="text"
        name="logo"
        id="logo"
        value="{{ old('logo', $exposant->logo) }}"
    >

    <label for="site_web">Site web</label>
    <input
        type="text"
        name="site_web"
        id="site_web"
        value="{{ old('site_web', $exposant->site_web) }}"
    >

    <label for="reseaux">Réseaux sociaux</label>
    <input
        type="text"
        name="reseaux"
        id="reseaux"
        value="{{ old('reseaux', $exposant->reseaux) }}"
    >

    <button type="submit">
        Enregistrer les modifications
    </button>

    <a href="{{ route('admin.exposants.index') }}">
        Annuler
    </a>
</form>

</main>
@endsection