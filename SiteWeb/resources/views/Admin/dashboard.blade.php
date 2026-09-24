@extends('Admin.layouts.app')

@section('content')

<main class="admin-dashboard">

    <h1>Tableau de bord</h1>

    <section class="dashboard-stats">

        <a href="{{ route('admin.users.index') }}" class="stat-card">
            <h2>Utilisateurs</h2>
            <strong>{{ $usersCount }}</strong>
            <span>Gérer les utilisateurs</span>
        </a>

        <a href="{{ route('admin.invites.index') }}" class="stat-card">
            <h2>Invités</h2>
            <strong>{{ $invitesCount }}</strong>
            <span>Gérer les invités</span>
        </a>

        <a href="{{ route('admin.exposants.index') }}" class="stat-card">
            <h2>Exposants</h2>
            <strong>{{ $exposantsCount }}</strong>
            <span>Gérer les exposants</span>
        </a>

        <a href="{{ route('admin.series.index') }}" class="stat-card">
            <h2>Séries</h2>
            <strong>{{ $seriesCount }}</strong>
            <span>Gérer les séries</span>
        </a>

        <a href="{{ route('admin.tags.index') }}" class="stat-card">
            <h2>Tags</h2>
            <strong>{{ $tagsCount }}</strong>
            <span>Gérer les tags</span>
        </a>

        <a href="{{ route('admin.typebillets.index') }}" class="stat-card">
            <h2>Types de billets</h2>
            <strong>{{ $typebilletsCount }}</strong>
            <span>Gérer les types de billets</span>
        </a>

        <div class="stat-card disabled">
            <h2>Programmes</h2>
            <strong>{{ $programmesCount }}</strong>
            <span>Gérer les programmes</span>
        </div>

        <div class="stat-card disabled">
            <h2>Billets</h2>
            <strong>{{ $billetsCount }}</strong>
            <span>Voir et rembourser les billets</span>
        </div>

        <div class="stat-card disabled">
            <h2>Dons</h2>
            <strong>{{ $donsCount }}</strong>
            <span>Consulter les dons</span>
        </div>

    </section>

</main>

@endsection