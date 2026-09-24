@extends('Admin.layouts.app')

@section('content')

<main class="admin-tags">

    <h1>Ajouter un tag</h1>

    @if ($errors->any())
        <div class="admin-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.tags.store') }}">

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

        <button type="submit">Ajouter</button>

        <a href="{{ route('admin.tags.index') }}">
            Annuler
        </a>

    </form>

</main>

@endsection