<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Billetterie</title>
    <link rel="stylesheet" href="{{ asset('css/billeterie.css') }}">
</head>
<body>

<h1>Billetterie</h1>

<div class="billets-container">

    @foreach ($typebillets as $billet)

        <div class="billet-card">

            <h2>{{ $billet->nom }}</h2>

            <p class="prix">
                {{ number_format($billet->prix, 2, ',', ' ') }} €
            </p>

            <p class="description">
                {{ $billet->description }}
            </p>

            <button>Acheter</button>

        </div>

    @endforeach

</div>

</body>
</html>