@extends('Admin.layouts.app')

@section('content')

<main class="admin-content admin-exposants">

<h1>Ajouter un exposant</h1>

@if ($errors->any())
    <ul class="admin-errors">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.exposants.store') }}" enctype="multipart/form-data">
    @csrf

    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" value="{{ old('nom') }}">

    <label for="description">Description</label>
    <textarea name="description" id="description">{{ old('description') }}</textarea>

    <label for="activite">Activité</label>
    <input type="text" name="activite" id="activite" value="{{ old('activite') }}">

    <label for="tag_id">Tag</label>
    <select name="tag_id" id="tag_id">
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">
                {{ $tag->nom }}
            </option>
        @endforeach
    </select>

    <label for="logo">Logo</label>
    <input type="file" name="logo" id="logo" accept="image/jpeg,image/png,image/webp">

    <label for="site_web">Site web</label>
    <input type="text" name="site_web" id="site_web" value="{{ old('site_web') }}">

    <label for="reseaux">Réseaux sociaux</label>
    <input type="text" name="reseaux" id="reseaux" value="{{ old('reseaux') }}">

    <button type="submit">Ajouter</button>
</form>

</main>
@endsection