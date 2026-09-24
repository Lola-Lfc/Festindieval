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

        <div class="stat-card disabled">
            <h2>Invités</h2>
            <strong>{{ $invitesCount }}</strong>
            <span>Gérer les invités</span>
        </div>

        <div class="stat-card disabled">
            <h2>Exposants</h2>
            <strong>{{ $exposantsCount }}</strong>
            <span>Gérer les exposants</span>
        </div>

        <a href="{{ route('admin.series.index') }}" class="stat-card">
            <h2>Séries</h2>
            <strong>{{ $seriesCount }}</strong>
            <span>Gérer les séries</span>
        </a>

        <div class="stat-card disabled">
            <h2>Tags</h2>
            <strong>{{ $tagsCount }}</strong>
            <span>Gérer les tags</span>
        </div>

        <div class="stat-card disabled">
            <h2>Types de billets</h2>
            <strong>{{ $typebilletsCount }}</strong>
            <span>Gérer les types de billets</span>
        </div>

        <div class="stat-card disabled">
            <h2>Types de billets</h2>
            <span>Gérer les types de billets</span>
        </div>

    </section>

</main>

@endsection