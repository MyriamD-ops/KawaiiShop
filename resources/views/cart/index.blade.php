@extends('layouts.app2')

@section('content')
<div class="max-w-4xl mx-auto">
   <h1 class="text-4xl font-bold text-gray-800 mb-8 flex items-center">
    <span class="mr-3">🛒</span> Panier de {{ Auth::user()->name }}
</h1>

    @if($cartItems->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Articles du panier -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="w-20 h-20 bg-pink-200 rounded-xl flex items-center justify-center mr-4">
                            @if($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover rounded-xl">
                            @else
                                <span class="text-2xl">🛍️</span>
                            @endif
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-gray-800">{{ $item->product->name }}</h3>
                            <p class="text-pink-500 font-bold">{{ number_format($item->product->prix, 2) }} €</p>
                            <p class="text-sm text-gray-500 mt-1">
                                Sous-total : <span class="font-semibold text-gray-700">{{ number_format($item->product->prix * $item->quantite, 2) }} €</span>
                            </p>
                        </div>
                        
                        <!-- Sélecteur de quantité -->
                        <div class="flex items-center space-x-2">
                            <!-- Bouton Diminuer -->
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="decrease">
                                <button type="submit" class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300 transition {{ $item->quantite <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $item->quantite <= 1 ? 'disabled' : '' }}>-</button>
                            </form>

                            <!-- Affichage quantité -->
                            <span class="text-xl font-bold mx-2">{{ $item->quantite }}</span>

                            <!-- Bouton Augmenter -->
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="increase">
                                <button type="submit" class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300 transition">+</button>
                            </form>
                        </div>

                        <!-- OU Saisie directe (décommentez pour utiliser) -->
                        <!--
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center space-x-2 ml-4">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="set">
                            <input 
                                type="number" 
                                name="quantite" 
                                value="{{ $item->quantite }}" 
                                min="1" 
                                max="99"
                                class="w-16 text-center font-bold border-2 border-pink-200 rounded-lg focus:border-pink-500 focus:outline-none py-1"
                            >
                            <button type="submit" class="bg-pink-500 text-white px-3 py-1 rounded-lg hover:bg-pink-600 transition text-sm">✓</button>
                        </form>
                        -->

                        <!-- Supprimer l'article -->
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xl transition" onclick="return confirm('Êtes-vous sûr de vouloir retirer cet article ?')">🗑️</button>
                        </form> 
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Résumé de commande -->
            <div class="bg-white rounded-2xl shadow-lg p-6 h-fit sticky top-4">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Résumé de commande</h3>
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between text-gray-600">
                        <span>Sous-total</span>
                        <span class="font-semibold">{{ number_format($cartItems->sum(function($item) { return $item->product->prix * $item->quantite; }), 2) }} €</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Livraison</span>
                        <span class="font-semibold">4,99 €</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold mt-4 pt-4 border-t border-gray-200">
                        <span>Total</span>
                        <span class="text-pink-500">{{ number_format($cartItems->sum(function($item) { return $item->product->prix * $item->quantite; }) + 4.99, 2) }} €</span>
                    </div>
                </div>

                <button class="w-full bg-pink-500 text-white py-4 rounded-xl font-bold text-lg hover:bg-pink-600 transition shadow-lg">
                    Commander 🎀
                </button>
                
                <p class="text-xs text-gray-500 text-center mt-4">
                    {{ $cartItems->sum('quantite') }} article(s) dans votre panier
                </p>
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

@if(session('success'))
<div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg animate-bounce z-50">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
    {{ session('error') }}
</div>
@endif
@endsection