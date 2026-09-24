@extends('Admin.layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@section('content')
    <main class="admin-dashboard">
        <h1>Tableau de bord</h1>

        <section class="dashboard-stats">
            <article class="stat-card">
                <h2>Invités</h2>
                <strong>{{ $invitesCount }}</strong>
            </article>

            <article class="stat-card">
                <h2>Exposants</h2>
                <strong>{{ $exposantsCount }}</strong>
            </article>

            <article class="stat-card">
                <h2>Programmes</h2>
                <strong>{{ $programmesCount }}</strong>
            </article>

            <article class="stat-card">
                <h2>Utilisateurs</h2>
                <strong>{{ $usersCount }}</strong>
            </article>
        </section>
    </main>
@endsection