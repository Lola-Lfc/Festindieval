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
                    <!-- Contenu lieu -->
                </div>
            </div>

            <div class="info-card">
                <h4 class="card-title title-red">Quand ?</h4>
                <div class="card-content">
                    <!-- Contenu date -->
                </div>
            </div>

            <div class="info-card">
                <h4 class="card-title title-green">Quoi ?</h4>
                <div class="card-content">
                    <!-- Contenu description -->
                </div>
            </div>

            <div class="info-card">
                <h4 class="card-title title-pink">Prix ?</h4>
                <div class="card-content">
                    <span class="price-value">5-50$</span>
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
                    <!-- Contenu dynamique de la carte -->
                </div>
                <a href="#" class="btn-voir-plus">VOIR PLUS</a>
            </div>

            <!-- Carte 2 : Stands -->
            <div class="edition-card">
                <h3 class="card-title title-red">STANDS</h3>
                <div class="card-body">
                    <!-- Contenu dynamique de la carte -->
                </div>
                <a href="#" class="btn-voir-plus">VOIR PLUS</a>
            </div>

            <!-- Carte 3 : Séries -->
            <div class="edition-card">
                <h3 class="card-title title-pink">SÉRIES</h3>
                <div class="card-body">
                    <!-- Contenu dynamique de la carte -->
                </div>
                <a href="#" class="btn-voir-plus">VOIR PLUS</a>
            </div>
        </div>
    </section>
@endsection