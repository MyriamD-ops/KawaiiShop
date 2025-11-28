@extends('layouts.app2')

@section('title', $category->name)

@section('content')
<div class="row">
    <div class="col">
        <h1>{{ $category->name }}</h1>
        <p><strong>Prix :</strong> {{ $category->price }} €</p>
        <p><strong>Description :</strong> {{ $category->description }}</p>
        
        @auth
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $category->id }}">
                <div style="margin: 15px 0;">
                    <label for="quantity" style="display: block;">Quantité :</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" 
                           style="width: 80px; padding: 5px;">
                </div>
                <button type="submit" class="btn">Ajouter au panier</button>
            </form>
        @else
            <p style="color: #666;">Connectez-vous pour ajouter au panier</p>
        @endauth
    </div>
</div>
@endsection