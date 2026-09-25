{{-- Utilise le layout situé dans resources/views/layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Tout ce qui est entre ces deux lignes va dans @yield('content') --}}
@section('content')
    {{-- Titre principal de la page d'accueil --}}
    <section class="main-section">
        <img src="{{ asset('images/banner.png') }}" alt="baniere" class="main-logo">
        <h1 class="main-title">FESTINDIVAL</h1>
    </section>
    <section class="event-section">
        <h3 class="rdv-title">RDV DANS :</h3>

        <!-- Compte à rebours dynamique -->
        <div class="countdown-container">
            <div class="countdown-item">
                <span class="number" id="days">00</span>
                <span class="bis">JOURS</span>
            </div>
            <div class="countdown-item">
                <span class="number" id="hours">00</span>
                <span class="bis">HEURES</span>
            </div>
            <div class="countdown-item">
                <span class="number" id="minutes">00</span>
                <span class="bis">MIN</span>
            </div>
            <div class="countdown-item">
                <span class="number" id="seconds">00</span>
                <span class="bis">SEC</span>
            </div>
        </div>

        <!-- Cartes d'informations -->
        <div class="cards-container">
            <div class="info-card">
                <h4 class="card-title title-blue">Où ?</h4>
                <div class="card-content">
                    <p>Parc des Expositions de Bordeaux</p>
                    <p>Cours Jules Ladoumegue<br>33300 Bordeaux</p>
                    <a href="https://www.google.com/maps/search/?api=1&query=Parc+des+Expositions+de+Bordeaux" target="_blank">Voir sur la carte</a>
                </div>
            </div>

            <div class="info-card">
                <h4 class="card-title title-red">Quand ?</h4>
                <div class="card-content">
                    <p>6-7 octobre 2026</p>
                    <p>De 10h à 18h</p>
                </div>
            </div>

            <div class="info-card">
                <h4 class="card-title title-green">Quoi ?</h4>
                <div class="card-content">
                    <p>Le festival des séries animées, de leurs créateurs et de leurs communautés.</p>
                    <a href="{{ url('/series') }}">Découvrir le festival</a>
                </div>
            </div>

            <div class="info-card">
                <h4 class="card-title title-pink">Prix ?</h4>
                <div class="card-content">
                    @if ($lowestTicketPrice !== null)
                        <span class="price-value">
                            {{ number_format($lowestTicketPrice, 2, ',', ' ') }} €
                            @if ($highestTicketPrice !== $lowestTicketPrice)
                                - {{ number_format($highestTicketPrice, 2, ',', ' ') }} €
                            @endif
                        </span>
                    @else
                        <span class="price-value">À venir</span>
                    @endif
                    <a href="{{ url('/billeterie') }}">Voir les billets</a>
                </div>
            </div>
        </div>
    </section>

    <section class="edition-section">
        <!-- Titre principal -->
        <h2 class="edition-title">DANS CETTE PREMIÈRE ÉDITION</h2>

        <!-- Conteneur des 3 cartes -->
        <div class="edition-cards-container">
            <!-- Carte 1 : Invités (plus large) -->
            <div class="edition-card card-large">
                <h3 class="card-title title-blue">INVITÉS</h3>
                <div class="card-body">
                    @forelse ($invites as $invite)
                        <article class="homepage-person">
                            @if ($invite->pfp)
                                <img src="{{ asset($invite->pfp) }}" alt="{{ $invite->nom }}">
                            @endif
                            <div>
                                <p class="homepage-person-name">{{ $invite->nom }}</p>
                                <p class="homepage-person-tag">{{ $invite->tag?->nom ?: 'Invité' }}</p>
                            </div>
                        </article>
                    @empty
                        <p>Les invités seront annoncés prochainement.</p>
                    @endforelse
                </div>
                <a href="{{ url('/invite') }}" class="btn-voir-plus">VOIR PLUS</a>
            </div>

            <!-- Carte 2 : Stands -->
            <div class="edition-card">
                <h3 class="card-title title-red">EXPOSANTS</h3>
                <div class="card-body">
                    @forelse ($exposants as $exposant)
                        <article class="homepage-person">
                            @if ($exposant->logo)
                                <img src="{{ asset($exposant->logo) }}" alt="{{ $exposant->nom }}">
                            @endif
                            <div>
                                <p class="homepage-person-name">{{ $exposant->nom }}</p>
                                <p class="homepage-person-tag">{{ $exposant->tag?->nom ?: 'Exposant' }}</p>
                            </div>
                        </article>
                    @empty
                        <p>Les exposants seront annoncés prochainement.</p>
                    @endforelse
                </div>
                <a href="{{ url('/exposants') }}" class="btn-voir-plus">VOIR PLUS</a>
            </div>

            <!-- Carte 3 : Séries -->
            <div class="edition-card">
                <h3 class="card-title title-pink">SÉRIES</h3>
                <div class="card-body">
                    @if ($featuredSerie)
                        @if ($featuredSerie->image)
                            <img class="homepage-series-image" src="{{ asset($featuredSerie->image) }}" alt="{{ $featuredSerie->nom }}">
                        @endif
                        <p>{{ $featuredSerie->nom }}</p>
                        <p>Cagnotte : {{ number_format($featuredSerie->dons->sum('montant'), 2, ',', ' ') }} €</p>
                        @if ($featuredSerie->lien)
                            <a class="homepage-series-watch" href="{{ $featuredSerie->lien }}" target="_blank" rel="noopener">Regarder la série</a>
                        @endif
                    @else
                        <p>Les séries seront annoncées prochainement.</p>
                    @endif
                </div>
                <a href="{{ url('/series') }}" class="btn-voir-plus">VOIR PLUS</a>
            </div>
        </div>
    </section>
@endsection