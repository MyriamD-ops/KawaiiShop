@extends('layouts.app2')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- En-tête de la catégorie -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 flex items-center">
            <span class="mr-3">
                @if($categoryName == 'Plushies') 🧸
                @elseif($categoryName == 'Papeterie') 📓
                @elseif($categoryName == 'Accessoires') 🎀
                @else 🛍️
                @endif
            </span>
            Catégorie : {{ ucfirst($categoryName) }}
        </h1>
        <p class="text-gray-600 mt-2">Découvrez tous nos produits {{ $categoryName }} kawaii</p>
    </div>

    <!-- Liste des produits -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-2xl shadow-lg p-4 transform hover:scale-105 transition duration-300">
                <!-- Image du produit -->
                <div class="w-full h-40 bg-pink-200 rounded-xl mb-4 flex items-center justify-center overflow-hidden">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-4xl">🛍️</span>
                    @endif
                </div>
                
                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 50) }}</p>
                <p class="text-pink-500 font-bold text-xl mb-2">{{ $product->prix }} €</p>
                
                <div class="flex justify-between items-center">
                    <a href="{{ url('/product/' . $product->id) }}" class="bg-pink-500 text-white px-4 py-2 rounded-full hover:bg-pink-600 transition">
                        Voir 🛒
                    </a>
                    @if($product->is_new)
                        <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">Nouveau</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <span class="text-6xl mb-4 block">😢</span>
            <h2 class="text-2xl font-bold text-gray-800">Aucun produit dans cette catégorie</h2>
            <p class="text-gray-600 mt-2">Revenez plus tard pour découvrir nos nouvelles arrivées !</p>
        </div>
    @endif
</div>
@endsection