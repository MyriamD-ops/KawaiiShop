@extends('layouts.app2')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Image du produit -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="w-full h-96 bg-pink-100 rounded-xl flex items-center justify-center">
                <span class="text-8xl">🐰</span>
            </div>
        </div>

        <!-- Détails du produit -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Peluche Lapin Rose</h1>
            <p class="text-2xl font-bold text-pink-500 mb-6">24,99€</p>
            
            <!-- Description -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">🎀 Description</h3>
                <p class="text-gray-600">Une peluche lapin super douce et toute mignonne, parfaite pour les câlins et décorer ta chambre !</p>
            </div>

            <!-- Sélecteur de quantité -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Quantité</label>
                <div class="flex items-center space-x-4">
                    <button class="w-10 h-10 rounded-full bg-pink-200 text-pink-700 flex items-center justify-center hover:bg-pink-300">-</button>
                    <span class="text-xl font-bold">1</span>
                    <button class="w-10 h-10 rounded-full bg-pink-200 text-pink-700 flex items-center justify-center hover:bg-pink-300">+</button>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="space-y-4">
                <button class="w-full bg-pink-500 text-white py-4 rounded-xl font-bold text-lg hover:bg-pink-600 transition flex items-center justify-center">
                    <span class="mr-2">🛒</span> Ajouter au panier
                </button>
                <button class="w-full border-2 border-pink-500 text-pink-500 py-4 rounded-xl font-bold text-lg hover:bg-pink-50 transition">
                    💖 Ajouter aux favoris
                </button>
            </div>
        </div>
    </div>
</div>
@endsection