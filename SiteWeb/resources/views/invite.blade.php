<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Invités</title>
    <link rel="stylesheet" href="{{ asset('css/invite.css') }}">
</head>
<body>

<h1>Invités</h1>

<div class="filtres">
    <button class="filtre actif" data-tag="tous">Tous</button>

    @foreach ($tags as $tag)
        <button class="filtre" data-tag="{{ $tag->id }}">
            {{ $tag->nom }}
        </button>
    @endforeach
</div>

<div class="invites-container">

    @foreach ($invites as $invite)

        <div class="invite-card" data-tag="{{ $invite->tag_id }}">

            <img src="{{ asset($invite->pfp) }}" alt="{{ $invite->nom }}">

            <div class="invite-content">

                <h2>{{ $invite->nom }}</h2>

                <p class="activite">
                    {{ $invite->activite }}
                </p>

                @if ($invite->tag)
                    <p class="tag">
                        {{ $invite->tag->nom }}
                    </p>
                @endif

                <div class="reseaux">

                    @if ($invite->youtube)
                        <a href="{{ $invite->youtube }}" target="_blank">YouTube</a>
                    @endif

                    @if ($invite->instagram)
                        <a href="{{ $invite->instagram }}" target="_blank">Instagram</a>
                    @endif

                    @if ($invite->tiktok)
                        <a href="{{ $invite->tiktok }}" target="_blank">TikTok</a>
                    @endif

                    @if ($invite->site_web)
                        <a href="{{ $invite->site_web }}" target="_blank">Site web</a>
                    @endif

                </div>

                <div class="description">
                    {{ $invite->description }}
                </div>

            </div>

        </div>

    @endforeach

</div>

<script>
    const filtres = document.querySelectorAll('.filtre')
    const invites = document.querySelectorAll('.invite-card')

    filtres.forEach(filtre => {
        filtre.addEventListener('click', () => {
            const tag = filtre.dataset.tag

            filtres.forEach(bouton => bouton.classList.remove('actif'))
            filtre.classList.add('actif')

            invites.forEach(invite => {
                if (tag === 'tous' || invite.dataset.tag === tag) {
                    invite.style.display = 'flex'
                } else {
                    invite.style.display = 'none'
                }
            })
        })
    })

    invites.forEach(invite => {
        invite.addEventListener('click', evenement => {
            if (evenement.target.closest('a')) {
                return
            }

            invite.classList.toggle('ouvert')
        })
    })
</script>

</body>
</html>