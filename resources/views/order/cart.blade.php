@extends('layouts.app2')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 flex items-center">
        <span class="mr-3">🛒</span> Mon Panier
    </h1>

    @if($cartItems->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Articles du panier -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center">
                    <div class="w-20 h-20 bg-pink-200 rounded-xl flex items-center justify-center mr-4">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover rounded-xl">
                        @else
                            <span class="text-2xl">🛍️</span>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-gray-800">{{ $item->product->name }}</h3>
                        <p class="text-pink-500 font-bold">{{ $item->product->prix }} €</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="decrease">
                            <button type="submit" class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300">-</button>
                        </form>
                        <span class="mx-2 font-bold">{{ $item->quantite }}</span>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="increase">
                            <button type="submit" class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300">+</button>
                        </form>
                    </div>
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">🗑️</button>
                    </form>
                </div>
                @endforeach
            </div>

            <!-- Résumé de commande -->
            <div class="bg-white rounded-2xl shadow-lg p-6 h-fit">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Résumé de commande</h3>
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span>Sous-total</span>
                        <span>{{ $cartItems->sum(function($item) { return $item->product->prix * $item->quantite; }) }} €</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Livraison</span>
                        <span>4,99 €</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold mt-4 pt-4 border-t">
                        <span>Total</span>
                        <span class="text-pink-500">{{ $cartItems->sum(function($item) { return $item->product->prix * $item->quantite; }) + 4.99 }} €</span>
                    </div>
                </div>

                <button class="w-full bg-pink-500 text-white py-4 rounded-xl font-bold text-lg hover:bg-pink-600 transition">
                    Commander 🎀
                </button>
            </div>
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-2xl shadow-lg">
            <span class="text-8xl mb-4 block">😢</span>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Votre panier est vide</h2>
            <p class="text-gray-600 mb-6">Découvrez nos produits et ajoutez-les à votre panier !</p>
            <a href="{{ route('home') }}" class="bg-pink-500 text-white px-8 py-3 rounded-full font-bold hover:bg-pink-600 transition">
                Retour à l'accueil 🏠
            </a>
        </div>
    @endif
</div>
@endsection