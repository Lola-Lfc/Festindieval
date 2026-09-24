<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exposants</title>
    <link rel="stylesheet" href="{{ asset('css/exposants.css') }}">
</head>
<body>

<h1>Exposants</h1>

<div class="filtres">
    <button class="filtre actif" data-tag="tous">Tous</button>

    @foreach ($tags as $tag)
        <button class="filtre" data-tag="{{ $tag->id }}">
            {{ $tag->nom }}
        </button>
    @endforeach
</div>

<div class="exposants-container">

    @foreach ($exposants as $exposant)

        <div class="exposant-card" data-tag="{{ $exposant->tag_id }}">

            <img src="{{ asset($exposant->logo) }}" alt="{{ $exposant->nom }}">

            <div class="exposant-content">

                <h2>{{ $exposant->nom }}</h2>

                @if ($exposant->activite)
                    <p class="activite">
                        {{ $exposant->activite }}
                    </p>
                @endif

                @if ($exposant->tag)
                    <p class="tag">
                        {{ $exposant->tag->nom }}
                    </p>
                @endif

                <div class="liens">

                    @if ($exposant->site_web)
                        <a href="{{ $exposant->site_web }}" target="_blank">
                            Site web
                        </a>
                    @endif

                    @if ($exposant->reseaux)
                        <a href="{{ $exposant->reseaux }}" target="_blank">
                            Réseaux
                        </a>
                    @endif

                </div>

                <div class="description">
                    {{ $exposant->description }}
                </div>

            </div>

        </div>

    @endforeach

</div>

<script>
    const filtres = document.querySelectorAll('.filtre')
    const exposants = document.querySelectorAll('.exposant-card')

    filtres.forEach(filtre => {
        filtre.addEventListener('click', () => {
            const tag = filtre.dataset.tag

            filtres.forEach(bouton => bouton.classList.remove('actif'))
            filtre.classList.add('actif')

            exposants.forEach(exposant => {
                if (tag === 'tous' || exposant.dataset.tag === tag) {
                    exposant.style.display = 'flex'
                } else {
                    exposant.style.display = 'none'
                }
            })
        })
    })

    exposants.forEach(exposant => {
        exposant.addEventListener('click', evenement => {
            if (evenement.target.closest('a')) {
                return
            }

            exposant.classList.toggle('ouvert')
        })
    })
</script>

</body>
</html>