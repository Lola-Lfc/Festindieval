<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <title>Festindieval</title>

</head>

<body class="admin-layout">

    <header class="floating-header">

        <div class="header-container">

            <a href="{{ url('/series') }}" class="nav-item border-sep item-cagnotte">

                <span>Cagnotte</span>

            </a>

            <a href="{{ url('/') }}" class="logo-wrapper border-sep item-logo">

                <div class="logo-box">

                    <img src="{{ asset('images/festindieval-logo.svg') }}" alt="Festindieval" class="logo-image">

                </div>

            </a>

            <a href="{{ url('/invite') }}" class="nav-item border-sep item-invites">

                <span>Invités</span>

            </a>

            <a href="{{ url('/exposants') }}" class="nav-item border-sep item-exposants">

                <span>Exposants</span>

            </a>

            <a href="{{ url('/programme') }}" class="nav-item border-sep item-programmation">

                <span>Programmation</span>

            </a>

            <a href="{{ url('/billeterie') }}" class="nav-item item-billetterie">

                <span class="billetterie-btn">
                    Billetterie <i class="bolt">⚡</i>
                </span>

            </a>

        </div>

    </header>

    @yield('content')

    <footer class="bottom-footer">

        <div class="footer-container">

            <div class="footer-col col-partenaires">

                <h4>NOS PARTENAIRES</h4>

                <div class="partner-logos">

                    <img src="{{ asset('images/logo-1.png') }}" alt="Logo partenaire 1">

                    <img src="{{ asset('images/logo-2.png') }}" alt="Logo partenaire 2">

                    <img src="{{ asset('images/logo-3.png') }}" alt="Logo partenaire 3">

                </div>

            </div>

            <div class="footer-separator" aria-hidden="true"></div>

            <div class="footer-col col-nav">

                <div class="footer-links">

                    <a href="{{ url('/invite') }}">Invités</a>

                    <a href="{{ url('/exposants') }}">Exposants</a>

                    <a href="{{ url('/programme') }}">Programmation</a>

                    <a href="{{ url('/billeterie') }}">Billetterie</a>

                    <a href="{{ url('/series') }}">Cagnotte</a>

                </div>

            </div>

            <div class="footer-separator" aria-hidden="true"></div>

            <div class="footer-col col-contact">

                <div class="footer-links">

                    <a href="https://www.google.com/maps/search/?api=1&query=Parc+des+Expositions+de+Bordeaux%2C+Cours+Jules+Ladoumegue%2C+33300+Bordeaux" target="_blank" rel="noopener">Endroit</a>

                    <a href="https://www.google.com/maps/search/?api=1&query=Parc+des+Expositions+de+Bordeaux%2C+Cours+Jules+Ladoumegue%2C+33300+Bordeaux" target="_blank" rel="noopener" class="map-btn">Carte Maps 📍</a>

                </div>

            </div>

        </div>

    </footer>

</body>

</html>