@extends('layouts.app')

@section('title', 'Billetterie')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/billeterie.css') }}">
@endsection

@section('content')
<h1>Billetterie</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<div class="billets-container">

    @foreach ($typebillets as $billet)

        <div class="billet-card">

            <h2>{{ $billet->nom }}</h2>

            <p class="prix">
                {{ number_format($billet->prix, 2, ',', ' ') }} €
            </p>

            <p class="description">
                {{ $billet->description }}
            </p>

            <button
                type="button"
                class="purchase-open"
                data-dialog-target="purchase-dialog-{{ $billet->id }}"
            >
                Acheter
            </button>

            <dialog id="purchase-dialog-{{ $billet->id }}" class="purchase-dialog">
                <form method="POST" action="{{ route('billeterie.purchase', $billet) }}">
                    @csrf

                    <h2>Confirmer l'achat</h2>
                    <p>{{ $billet->nom }}</p>

                    <label for="quantity-{{ $billet->id }}">Quantité</label>
                    <input
                        id="quantity-{{ $billet->id }}"
                        name="quantity"
                        type="number"
                        min="1"
                        max="10"
                        value="1"
                        data-unit-price="{{ $billet->prix }}"
                        required
                    >

                    <p>Total : <strong class="purchase-total">{{ number_format($billet->prix, 2, ',', ' ') }} €</strong></p>

                    <button type="button" class="purchase-cancel">Annuler</button>
                    <button type="submit">Confirmer l'achat</button>
                </form>
            </dialog>

        </div>

    @endforeach

</div>

<script>
    document.querySelectorAll('[data-dialog-target]').forEach((button) => {
        const dialog = document.getElementById(button.dataset.dialogTarget);
        const form = dialog.querySelector('form');
        const quantity = form.querySelector('[name="quantity"]');
        const total = form.querySelector('.purchase-total');
        const unitPrice = Number(quantity.dataset.unitPrice);

        button.addEventListener('click', () => dialog.showModal());

        form.querySelector('.purchase-cancel').addEventListener('click', () => dialog.close());

        quantity.addEventListener('input', () => {
            const amount = Math.max(1, Number(quantity.value) || 1);
            total.textContent = (unitPrice * amount).toFixed(2).replace('.', ',') + ' €';
        });
    });
</script>
@endsection