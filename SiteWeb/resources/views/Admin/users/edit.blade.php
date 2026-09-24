@extends('Admin.layouts.app')

@section('content')

<main class="admin-users">

    <h1>Modifier {{ $user->name }}</h1>

    @if ($errors->any())
        <div class="admin-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.users.update', $user) }}">

        @csrf
        @method('PUT')

        <div>
            <label for="name">Nom</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
            >
        </div>

        <div>
            <label for="email">Email</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
            >
        </div>

        <div>
            <label for="password">Nouveau mot de passe</label>

            <input
                type="password"
                id="password"
                name="password"
            >

            <small>Laisser vide pour conserver le mot de passe actuel.</small>
        </div>

        <div>
            <label for="role">Rôle</label>

            <select id="role" name="role" required>

                <option
                    value="user"
                    @selected(old('role', $user->role) === 'user')
                >
                    Utilisateur
                </option>

                <option
                    value="admin"
                    @selected(old('role', $user->role) === 'admin')
                >
                    Administrateur
                </option>

            </select>
        </div>

        <button type="submit">
            Enregistrer
        </button>

        <a href="{{ route('admin.users.index') }}">
            Annuler
        </a>

    </form>

</main>

@endsection