<h1>Invités</h1>

@foreach ($invites as $invite)
    <h2>{{ $invite->nom }}</h2>

    <img src="{{ asset($invite->pfp) }}" alt="{{ $invite->nom }}">

    <p>{{ $invite->description }}</p>
    <p>{{ $invite->activite }}</p>

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
@endforeach