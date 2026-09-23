<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Festindival</title>
</head>
<body>
    <h1>Connexion à l'administration</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
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
</body>
</html>