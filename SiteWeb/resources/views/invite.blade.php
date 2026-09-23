<h1>Invités</h1>

@foreach ($invites as $invite)
    <h2>{{ $invite->nom }}</h2>
    <p>{{ $invite->description }}</p>
    <p>{{ $invite->activite }}</p>
@endforeach