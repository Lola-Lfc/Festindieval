@extends('Admin.layouts.app')

@section('content')

<main class="admin-billets">

    <h1>Billets achetés</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @if ($billets->isEmpty())

        <p>Aucun billet acheté pour le moment.</p>

    @else

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Email</th>
                    <th>Type de billet</th>
                    <th>Prix</th>
                    <th>Date d'achat</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($billets as $billet)

                    <tr>
                        <td>{{ $billet->id }}</td>

                        <td>{{ $billet->user->name }}</td>

                        <td>{{ $billet->user->email }}</td>

                        <td>{{ $billet->type->nom }}</td>

                        <td>
                            {{ number_format($billet->type->prix, 2, ',', ' ') }} €
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($billet->date_achat)->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            <form
                                method="POST"
                                action="{{ route('admin.billets.refund', $billet) }}"
                                style="display: inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Voulez-vous vraiment rembourser ce billet ?')"
                                >
                                    Rembourser
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    @endif

</main>

@endsection