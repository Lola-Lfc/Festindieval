{{-- Utilise le layout situé dans resources/views/layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Tout ce qui est entre ces deux lignes va dans @yield('content') --}}
@section('content')
    {{-- Titre principal de la page d'accueil --}}
    <section>
        <h1>section 1</h1>
    </section>
    {{-- Petit texte de présentation --}}
    <p>Découvrez notre festival médiéval.</p>
    {{-- Lien vers la page du programme --}}
    <a href="/programme">Voir le programme</a>
@endsection