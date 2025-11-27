@extends('layouts.app2')

@section('title', 'Tous les produits')

@section('content')
<h1>Nos Produits</h1>

<div class="row">
    @foreach($products as $product)
    <div class="col" style="flex: 0 0 33.333%;">
        <div class="card">
            <h3>{{ $product->name }}</h3>
            <p>Prix : {{ $product->price }} €</p>
            <a href="{{ route('products.show', $product) }}" class="btn">Voir détails</a>
            @auth
                <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-success">Ajouter au panier</button>
                </form>
            @endauth
        </div>
    </div>
    @endforeach
</div>
@endsection