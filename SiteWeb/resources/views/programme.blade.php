@extends('layouts.app')

@section('title', 'Programme')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/programme.css') }}">
@endsection

@section('content')
<h1>Programme</h1>

<div class="calendrier">

    @foreach ($programmes as $jour => $evenements)

        <div class="jour">

            <h2>Jour {{ $jour }}</h2>

            @foreach ($evenements as $programme)

                <div class="evenement">

                    <div class="horaire">
                        {{ \Carbon\Carbon::parse($programme->dt_heure_debut)->format('H:i') }}
                        -
                        {{ \Carbon\Carbon::parse($programme->dt_heure_fin)->format('H:i') }}
                    </div>

                    <h3>{{ $programme->nom }}</h3>

                    @if ($programme->invite)
                        <p class="invite">
                            Présenté par {{ $programme->invite->nom }}
                        </p>
                    @endif

                    <p class="description">
                        {{ $programme->description }}
                    </p>

                </div>

            @endforeach

        </div>

    @endforeach

</div>
@endsection