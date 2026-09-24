@extends('Admin.layouts.app')

@section('content')

<main class="admin-users">

    <h1>Gestion des utilisateurs</h1>
    
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <a href="{{ route('admin.users.create') }}">
        Ajouter un utilisateur
    </a>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Création</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>{{ $user->role }}</td>

                    <td>{{ $user->created_at?->format('d/m/Y') }}</td>

                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}">
                            Modifier
                        </a>
                        <form
                            method="POST"
                            action="{{ route('admin.users.destroy', $user) }}"
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Supprimer cet utilisateur ?')"
                            >
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

</main>

@endsection