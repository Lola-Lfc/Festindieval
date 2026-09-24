@extends('Admin.layouts.app')

@section('content')

<main class="admin-dons">

    <h1>Dons</h1>

    @if ($dons->isEmpty())

        <p>Aucun don effectué pour le moment.</p>

    @else

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Email</th>
                    <th>Série</th>
                    <th>Montant</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dons as $don)

                    <tr>
                        <td>{{ $don->id }}</td>

                        <td>{{ $don->user->name }}</td>

                        <td>{{ $don->user->email }}</td>

                        <td>{{ $don->serie->nom }}</td>

                        <td>
                            {{ number_format($don->montant, 2, ',', ' ') }} €
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($don->date_don)->format('d/m/Y H:i') }}
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    @endif

</main>

@endsection