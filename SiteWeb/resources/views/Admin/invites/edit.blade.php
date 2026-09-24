@extends('Admin.layouts.app')

@section('content')
<main class="admin-content">
    <h1>Modifier {{ $invite->nom }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('admin.invites.update', $invite) }}">
        @csrf
        @method('PUT')

        <label for="nom">Nom</label>
        <input id="nom" name="nom" type="text" value="{{ old('nom', $invite->nom) }}" required>

        <label for="activite">Activité</label>
        <input id="activite" name="activite" type="text" value="{{ old('activite', $invite->activite) }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description', $invite->description) }}</textarea>

        <label for="tag_id">Tag</label>
        <select id="tag_id" name="tag_id" required>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" @selected(old('tag_id', $invite->tag_id) == $tag->id)>
                    {{ $tag->nom }}
                </option>
            @endforeach
        </select>

        <label for="pfp">Photo de profil</label>
        <input id="pfp" name="pfp" type="text" value="{{ old('pfp', $invite->pfp) }}">

        <label for="youtube">YouTube</label>
        <input id="youtube" name="youtube" type="url" value="{{ old('youtube', $invite->youtube) }}">

        <label for="instagram">Instagram</label>
        <input id="instagram" name="instagram" type="url" value="{{ old('instagram', $invite->instagram) }}">

        <label for="tiktok">TikTok</label>
        <input id="tiktok" name="tiktok" type="url" value="{{ old('tiktok', $invite->tiktok) }}">

        <label for="site_web">Site web</label>
        <input id="site_web" name="site_web" type="url" value="{{ old('site_web', $invite->site_web) }}">

        <button type="submit">Enregistrer</button>
        <a href="{{ route('admin.invites.index') }}">Annuler</a>
    </form>
</main>
@endsection