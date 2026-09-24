@extends('Admin.layouts.app')

@section('content')
<main class="admin-content">
    <h1>Ajouter un invité</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('admin.invites.store') }}">
        @csrf

        <label for="nom">Nom</label>
        <input id="nom" name="nom" type="text" value="{{ old('nom') }}" required>

        <label for="activite">Activité</label>
        <input id="activite" name="activite" type="text" value="{{ old('activite') }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>

        <label for="tag_id">Tag</label>
        <select id="tag_id" name="tag_id" required>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" @selected(old('tag_id') == $tag->id)>
                    {{ $tag->nom }}
                </option>
            @endforeach
        </select>

        <label for="pfp">Photo de profil</label>
        <input id="pfp" name="pfp" type="text" value="{{ old('pfp') }}">

        <label for="youtube">YouTube</label>
        <input id="youtube" name="youtube" type="url" value="{{ old('youtube') }}">

        <label for="instagram">Instagram</label>
        <input id="instagram" name="instagram" type="url" value="{{ old('instagram') }}">

        <label for="tiktok">TikTok</label>
        <input id="tiktok" name="tiktok" type="url" value="{{ old('tiktok') }}">

        <label for="site_web">Site web</label>
        <input id="site_web" name="site_web" type="url" value="{{ old('site_web') }}">

        <button type="submit">Créer l'invité</button>
        <a href="{{ route('admin.invites.index') }}">Annuler</a>
    </form>
</main>
@endsection