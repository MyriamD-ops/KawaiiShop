@extends('layouts.app2')

@section('title', 'Mon Panier')

@section('content')
<h1>Mon Panier</h1>

@if($cartItems->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }} €</td>
                <td>
                    <form action="{{ route('lines.update', $item) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                               style="width: 60px; padding: 5px;">
                    </form>
                </td>
                <td>{{ $item->product->price * $item->quantity }} €</td>
                <td>
                    <form action="{{ route('lines.destroy', $item) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <form action="{{ route('cart.clear') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit" class="btn" style="background: #ffc107;">Vider le panier</button>
    </form>
@else
    <p>Votre panier est vide</p>
@endif
@endsection