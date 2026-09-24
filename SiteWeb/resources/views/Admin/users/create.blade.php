@extends('Admin.layouts.app')

@section('content')

<main class="admin-users">

    <h1>Créer un utilisateur</h1>

    @if ($errors->any())
        <div class="admin-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.store') }}">

        @csrf

        <div>
            <label for="name">Nom</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div>
            <label for="email">Email</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div>
            <label for="password">Mot de passe</label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <div>
            <label for="role">Rôle</label>

            <select id="role" name="role" required>
                <option value="user" @selected(old('role') === 'user')>
                    Utilisateur
                </option>

                <option value="admin" @selected(old('role') === 'admin')>
                    Administrateur
                </option>
            </select>
        </div>

        <button type="submit">
            Créer l'utilisateur
        </button>

        <a href="{{ route('admin.users.index') }}">
            Annuler
        </a>

    </form>

</main>

@endsection