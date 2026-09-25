<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Séries</title>
    <link rel="stylesheet" href="{{ asset('css/series.css') }}">
</head>

<body>
@extends('layouts.app')

@section('title', 'Séries')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/series.css') }}">
@endsection

@section('content')
<h1>Séries</h1>

<div class="series-container">

    @foreach ($series as $serie)

        <div class="serie-card">

            <img src="{{ asset($serie->image) }}" alt="{{ $serie->nom }}">

            <div class="serie-content">

                <h2>{{ $serie->nom }}</h2>

                <p>{{ $serie->description }}</p>

                <p>
                    <strong>
                        Cagnotte récoltée :
                        {{ number_format($serie->dons->sum('montant'), 2, ',', ' ') }} €
                    </strong>
                </p>

                @auth

                    <form method="POST" action="{{ route('series.don', $serie) }}" class="don-form">

                        @csrf

                        <input
                            type="number"
                            name="montant"
                            min="1"
                            step="0.01"
                            placeholder="Montant en €"
                            required
                        >

                        <button type="submit">
                            Faire un don
                        </button>

                    </form>

                @else

                    <a href="{{ url('/login') }}">
                        Se connecter pour faire un don
                    </a>

                @endauth

                <a href="{{ $serie->lien }}" target="_blank">
                    Regarder la série
                </a>

            </div>

        </div>

    @endforeach

</div>

</body>

</html>
