@extends('Admin.layouts.app')

@section('content')
<main class="admin-content">
    <h1>Ajouter un événement</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('admin.programmes.store') }}">
        @csrf

        <label for="nom">Nom</label>
        <input id="nom" name="nom" type="text" value="{{ old('nom') }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>

        <label for="invite_id">Invité</label>
        <select id="invite_id" name="invite_id" required>
            @foreach ($invites as $invite)
                <option value="{{ $invite->id }}" @selected(old('invite_id') == $invite->id)>
                    {{ $invite->nom }}
                </option>
            @endforeach
        </select>

        <label for="jour">Jour</label>
        <input id="jour" name="jour" type="number" min="1" value="{{ old('jour', 1) }}" required>

        <label for="dt_heure_debut">Début</label>
        <input id="dt_heure_debut" name="dt_heure_debut" type="datetime-local" value="{{ old('dt_heure_debut') }}" required>

        <label for="dt_heure_fin">Fin</label>
        <input id="dt_heure_fin" name="dt_heure_fin" type="datetime-local" value="{{ old('dt_heure_fin') }}" required>

        <button type="submit">Créer l'événement</button>
        <a href="{{ route('admin.programmes.index') }}">Annuler</a>
    </form>
</main>
@endsection