@extends('layouts.app2')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 flex items-center">
        <span class="mr-3">🛒</span> Mon Panier Kawaii
    </h1>

    @if($cartItems && $cartItems->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Articles du panier -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center transform hover:scale-105 transition duration-300">
                    <!-- Image du produit -->
                    <div class="w-20 h-20 bg-pink-200 rounded-xl flex items-center justify-center mr-4 overflow-hidden">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <span class="text-2xl">🎀</span>
                        @endif
                    </div>
                    
                    <!-- Infos du produit -->
                    <div class="flex-grow">
                        <h3 class="font-bold text-gray-800">{{ $item->product->name }}</h3>
                        <p class="text-pink-500 font-bold">{{ $item->product->formatted_price }}</p>
                    </div>
                    
                    <!-- Sélecteur de quantité -->
                    
                    <div class="flex items-center space-x-2">
                        
                    </div>
                    
                    <!-- Bouton supprimer -->
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 transition">🗑️</button>
                    </form>
                </div>
                @endforeach
                
                <!-- Bouton vider le panier -->
                <div class="text-center mt-6">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600 transition">
                            🧹 Vider le panier
                        </button>
                    </form>
                </div>
            </div>

            <!-- Résumé de commande -->
            <div class="bg-white rounded-2xl shadow-lg p-6 h-fit sticky top-4">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Résumé de commande</h3>
                
                @php
                    $sousTotal = 0;
                    foreach($cartItems as $item) {
                        $sousTotal += $item->product->prix * $item->quantite;
                    }
                    $livraison = 4.99;
                    $total = $sousTotal + $livraison;
                @endphp
                
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Sous-total</span>
                        <span class="font-bold">{{ number_format($sousTotal, 2, ',', ' ') }} €</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Livraison</span>
                        <span class="font-bold">{{ number_format($livraison, 2, ',', ' ') }} €</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold mt-4 pt-4 border-t border-gray-200">
                        <span class="text-pink-500">Total</span>
                        <span class="text-pink-500">{{ number_format($total, 2, ',', ' ') }} €</span>
                    </div>
                </div>

                <button class="w-full bg-pink-500 text-white py-4 rounded-xl font-bold text-lg hover:bg-pink-600 transition flex items-center justify-center">
                    <span class="mr-2">✨</span> Commander maintenant
                </button>
                
                <p class="text-center text-gray-500 text-sm mt-4">
                    Livraison offerte à partir de 50€ d'achat 🎁
                </p>
            </div>
        </div>
    @else
        <!-- Panier vide -->
        <div class="text-center py-16 bg-white rounded-2xl shadow-lg">
            <span class="text-8xl mb-4 block">😢</span>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Votre panier est vide</h2>
            <p class="text-gray-600 mb-6">Découvrez nos produits kawaii et remplissez-le de bonheur !</p>
            <a href="{{ route('products.index') }}" 
               class="bg-pink-500 text-white px-8 py-3 rounded-full font-bold hover:bg-pink-600 transition inline-flex items-center">
                <span class="mr-2">🛍️</span> Découvrir la boutique
            </a>
        </div>
    @endif
</div>
@endsection