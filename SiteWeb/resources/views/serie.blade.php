<h1>Séries</h1>

@foreach ($series as $serie)
    <h2>{{ $serie->nom }}</h2>
    <img src="{{ asset($serie->image) }}" alt="{{ $serie->nom }}">
    <p>{{ $serie->description }}</p>
    <a href="{{ $serie->lien }}" target="_blank">Regarder la série</a>
    <br>
@endforeach