<h1>Billetterie</h1>

@foreach ($typebillets as $billet)
    <h2>{{ $billet->nom }}</h2>
    <p>{{ $billet->description }}</p>
    <p>{{ $billet->prix }} €</p>
@endforeach