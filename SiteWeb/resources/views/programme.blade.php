<h1>Programme</h1>

@foreach ($programmes as $programme)
    <h2>{{ $programme->nom }}</h2>
    <p>{{ $programme->description }}</p>
    <p>{{ $programme->dt_heure_debut }}</p>
@endforeach