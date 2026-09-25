@extends('layouts.app')

@section('title', 'Connexion - Festindieval')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    @auth
        <main class="auth-card">
            <h1>Vous êtes connecté</h1>

            <p>Bonjour {{ auth()->user()->name }}.</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit">Se déconnecter</button>
            </form>
        </main>
    @else
        <main class="auth-card">
            <h1 id="auth-title">{{ session('show_register') ? 'Inscription' : 'Connexion' }}</h1>

            @if ($errors->any())
                <div class="auth-errors">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                </div>
            @endif

        <form class="auth-form" id="login-form" method="POST" action="{{ route('login.store') }}">
            @csrf

            <div>
                <label for="email">Adresse email</label>

                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div>
                <label for="password">Mot de passe</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                >
            </div>

            <div>
                <label>
                    <input type="checkbox" name="remember">
                    Se souvenir de moi
                </label>
            </div>

            <button type="submit">
                Se connecter
            </button>
        </form>

            <button id="show-register" type="button">S'inscrire</button>

            <form
                class="auth-form"
            id="register-form"
            method="POST"
            action="{{ route('register.store') }}"
            @if (!session('show_register')) hidden @endif
        >
            @csrf

            <div>
                <label for="register-name">Nom</label>
                <input
                    id="register-name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div>
                <label for="register-email">Adresse email</label>
                <input
                    id="register-email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div>
                <label for="register-password">Mot de passe</label>
                <input
                    id="register-password"
                    name="password"
                    type="password"
                    minlength="8"
                    required
                >
            </div>

            <div>
                <label for="register-password-confirmation">Confirmer le mot de passe</label>
                <input
                    id="register-password-confirmation"
                    name="password_confirmation"
                    type="password"
                    minlength="8"
                    required
                >
            </div>

            <button type="submit">Créer mon compte</button>
            <button id="show-login" type="button">Retour à la connexion</button>
            </form>

        <script>
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const showRegister = document.getElementById('show-register');
            const showLogin = document.getElementById('show-login');
            const authTitle = document.getElementById('auth-title');

            showRegister.addEventListener('click', () => {
                loginForm.hidden = true;
                showRegister.hidden = true;
                registerForm.hidden = false;
                authTitle.textContent = 'Inscription';
            });

            showLogin.addEventListener('click', () => {
                registerForm.hidden = true;
                showRegister.hidden = false;
                loginForm.hidden = false;
                authTitle.textContent = 'Connexion';
            });
            </script>
        </main>
    @endauth
@endsection