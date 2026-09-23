<h1>Exposants</h1>

@foreach ($exposants as $exposant)
    <h2>{{ $exposant->nom }}</h2>

    <img src="{{ asset($exposant->logo) }}" alt="{{ $exposant->nom }}">

    <p>{{ $exposant->description }}</p>

    @if ($exposant->site_web)
        <a href="{{ $exposant->site_web }}" target="_blank">Site web</a>
    @endif

    @if ($exposant->reseaux)
        <a href="{{ $exposant->reseaux }}" target="_blank">Réseaux sociaux</a>
    @endif
@endforeach