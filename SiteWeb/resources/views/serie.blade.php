<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Séries</title>
    <link rel="stylesheet" href="{{ asset('css/series.css') }}">
</head>
<body>

<h1>Séries</h1>

<div class="series-container">
    @foreach ($series as $serie)
        <div class="serie-card">

            <img src="{{ asset($serie->image) }}" alt="{{ $serie->nom }}">

            <div class="serie-content">
                <h2>{{ $serie->nom }}</h2>

                <p>{{ $serie->description }}</p>

                <p class="cagnotte">
                    Cagnotte récoltée : {{ $serie->dons->sum('montant') }} €
                </p>

                <a href="{{ $serie->lien }}" target="_blank">
                    Regarder la série
                </a>
            </div>

        </div>
    @endforeach
</div>

</body>
</html>