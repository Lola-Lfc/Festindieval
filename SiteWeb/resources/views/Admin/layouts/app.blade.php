{{-- Début de la page HTML --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    {{-- Permet d'afficher correctement les caractères français --}}
    <meta charset="UTF-8">
    {{-- Relie cette page au fichier CSS situé dans public/css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    {{-- Titre affiché dans l'onglet du navigateur --}}
    <title>Festindival</title>
</head>
<body>
    {{-- Header : partie supérieure commune à toutes les pages --}}
    <header class="floating-header">
        <div class="header-container">
            <!-- 5/30 -->
            <a href="#" class="nav-item border-sep item-cagnotte">
                <span>Cagnotte</span>
            </a>

            <!-- 8/30 -->
            <div class="logo-wrapper border-sep item-logo">
                <div class="logo-box">
                    <span class="logo-text">LOGO</span>
                </div>
            </div>

            <!-- 4/30 -->
            <a href="#" class="nav-item border-sep item-invites">
                <span>Invités</span>
            </a>

            <!-- 4/30 -->
            <a href="#" class="nav-item border-sep item-exposants">
                <span>Exposants</span>
            </a>

            <!-- 4/30 -->
            <a href="#" class="nav-item border-sep item-programmation">
                <span>Programmation</span>
            </a>

            <!-- 5/30 -->
            <a href="#" class="nav-item item-billetterie">
                <span class="billetterie-btn">Billetterie <i class="bolt">⚡</i></span>
            </a>
        </div>
    </header>
    {{-- Le contenu de chaque page sera affiché ici --}}
    @yield('content')

    {{-- Footer : partie inférieure commune à toutes les pages --}}
    <footer class="bottom-footer">
        <div class="footer-container">
            <!-- Colonne 1 : Partenaires -->
            <div class="footer-col col-partenaires">
                <h4>NOS PARTENAIRES</h4>
                <div class="partner-logos">
                    <img src="images/logo-1.png" alt="Logo partenaire 1">
                    <img src="images/logo-2.png" alt="Logo partenaire 2">
                    <img src="images/logo-3.png" alt="Logo partenaire 3">
                </div>
            </div>

            <div class="footer-separator" aria-hidden="true"></div>

            <!-- Colonne 2 : Navigation -->
            <div class="footer-col col-nav">
                <div class="footer-links">
                    <a href="#">Invités</a>
                    <a href="#">Exposants</a>
                    <a href="#">Programmation</a>
                    <a href="#">Billetterie</a>
                    <a href="#">Cagnotte</a>
                </div>
            </div>

            <div class="footer-separator" aria-hidden="true"></div>

            <!-- Colonne 3 : Contact -->
            <div class="footer-col col-contact">
                <div class="footer-links">
                    <a href="#">Endroit</a>
                    <a href="#" class="map-btn">Carte Maps 📍</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>