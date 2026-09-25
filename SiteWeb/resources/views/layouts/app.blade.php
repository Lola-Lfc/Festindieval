<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    @yield('styles')

    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>@yield('title', 'Festindieval')</title>

</head>

<body>

    <header class="floating-header">

        <div class="header-container">

            <a href="/series" class="nav-item border-sep item-cagnotte">

                <span>Séries</span>

            </a>

            <div class="logo-wrapper border-sep item-logo">

                <a href="/" class="logo-box">

                    <img src="{{ asset('images/festindieval-logo.svg') }}" alt="Festindieval" class="logo-image">

                </a>

            </div>

            <a href="/invite" class="nav-item border-sep item-invites">

                <span>Invités</span>

            </a>

            <a href="/exposants" class="nav-item border-sep item-exposants">

                <span>Exposants</span>

            </a>

            <a href="/programme" class="nav-item border-sep item-programmation">

                <span>Programmation</span>

            </a>

            <a href="/billeterie" class="nav-item border-sep item-billetterie">

                <span class="billetterie-btn">Billetterie</span>

            </a>

            @guest

                @guest

                    <a href="/login" class="nav-item">
                        <span>Connexion</span>
                    </a>

                @endguest

            @endguest

            @auth

                <form method="POST" action="/logout" class="logout-form">

                    @csrf

                    <button type="submit" class="nav-item logout-btn">

                        <span>Déconnexion</span>

                    </button>

                </form>

            @endauth

        </div>

    </header>

    <main class="page-shell">
        @yield('content')
    </main>

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

                    <a href="/invite">Invités</a>

                    <a href="/exposants">Exposants</a>

                    <a href="/programme">Programmation</a>

                    <a href="/billeterie">Billetterie</a>

                    <a href="/series">Séries</a>

                </div>

            </div>

            <div class="footer-separator" aria-hidden="true"></div>

            <div class="footer-col col-contact">

                <div class="footer-links">

                    <a href="#">Endroit</a>

                    <a href="#" class="map-btn">Carte Maps</a>

                </div>

            </div>

        </div>

    </footer>

</body>

</html>