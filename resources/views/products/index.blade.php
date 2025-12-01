@extends('layouts.app2')

@section('title', 'Tous les produits')

@section('content')
<h1>Nos Produits</h1>



<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($products as $product)
    <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
        <!-- IMAGE DU PRODUIT -->
        <div class="w-full h-48 bg-pink-200 rounded-xl mb-4 flex items-center justify-center overflow-hidden">
            @if($product->image)
              <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                <!-- IMAGE PAR DÉFAUT SI PAS DE PHOTO -->
                <span class="text-6xl">🛍️</span>
            @endif
        </div>
        
        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $product->name }}</h3>
        <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 50) }}</p>
        <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-pink-500">{{ $product->prix }} €</span>
            <a href="{{ route('products.show', $product->id) }}" class="bg-pink-500 text-white px-4 py-2 rounded-full hover:bg-pink-600 transition">
                Voir 🛒
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection 
