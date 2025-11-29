<!-- On étend le layout principal -->
@extends('layouts.app2')

<!-- On définit la section content -->
@section('content')
    <!-- Section Hero (bannière) -->
    <section class="mb-16">
        <div class="bg-gradient-to-r from-pink-400 to-purple-400 rounded-3xl p-8 text-white text-center">
            <h2 class="text-4xl font-bold mb-4">Bienvenue dans notre univers kawaii !</h2>
            <p class="text-xl mb-6">Découvrez des produits adorables qui rendent la vie plus douce</p>
            <button class="bg-white text-pink-500 px-8 py-3 rounded-full font-bold text-lg hover:bg-pink-100 transition">
                Découvrir 🎀
            </button>
        </div>
    </section>

    <!-- Section Nouveautés -->
    <section class="mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center">
            <span class="mr-3">🆕</span> Nouveautés
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Produit 1 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
                <div class="w-full h-48 bg-pink-200 rounded-xl mb-4 flex items-center justify-center">
                    <span class="text-6xl">🐰</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Peluche Lapin Rose</h3>
                <p class="text-gray-600 mb-4">Tout doux pour les câlins</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-pink-500">24,99€</span>
                    <button class="bg-pink-500 text-white px-4 py-2 rounded-full hover:bg-pink-600 transition">
                        Ajouter 🛒
                    </button>
                </div>
            </div>
            <!-- Produit 2 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
                <div class="w-full h-48 bg-purple-200 rounded-xl mb-4 flex items-center justify-center">
                    <span class="text-6xl">🐱</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Peluche Chat Violet</h3>
                <p class="text-gray-600 mb-4">Tout doux pour les câlins</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-pink-500">22,99€</span>
                    <button class="bg-pink-500 text-white px-4 py-2 rounded-full hover:bg-pink-600 transition">
                        Ajouter 🛒
                    </button>
                </div>
            </div>
            <!-- Produit 3 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
                <div class="w-full h-48 bg-yellow-200 rounded-xl mb-4 flex items-center justify-center">
                    <span class="text-6xl">🐻</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Peluche Ours Jaune</h3>
                <p class="text-gray-600 mb-4">Tout doux pour les câlins</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-pink-500">26,99€</span>
                    <button class="bg-pink-500 text-white px-4 py-2 rounded-full hover:bg-pink-600 transition">
                        Ajouter 🛒
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Catégories -->
    <section class="mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center">
            <span class="mr-3">📁</span> Catégories
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Catégorie 1 -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition">
                <span class="text-4xl mb-3 block">🧸</span>
                <h3 class="font-bold text-gray-800">Peluches</h3>
            </div>
            <!-- Catégorie 2 -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition">
                <span class="text-4xl mb-3 block">📓</span>
                <h3 class="font-bold text-gray-800">Papeterie</h3>
            </div>
            <!-- Catégorie 3 -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition">
                <span class="text-4xl mb-3 block">👚</span>
                <h3 class="font-bold text-gray-800">Vêtements</h3>
            </div>
            <!-- Catégorie 4 -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition">
                <span class="text-4xl mb-3 block">🎀</span>
                <h3 class="font-bold text-gray-800">Accessoires</h3>
            </div>
        </div>
    </section>

    <!-- Section Produits Populaires -->
    <section>
        <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center">
            <span class="mr-3">⭐</span> Produits Populaires
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Produit 1 -->
            <div class="bg-white rounded-2xl shadow-lg p-4 transform hover:scale-105 transition duration-300">
                <div class="w-full h-32 bg-green-200 rounded-xl mb-4 flex items-center justify-center">
                    <span class="text-4xl">🍓</span>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Collier Fraise</h3>
                <p class="text-gray-600 text-sm mb-2">Accessoire trop mignon</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-pink-500">12,99€</span>
                    <button class="bg-pink-500 text-white px-3 py-1 rounded-full text-sm hover:bg-pink-600 transition">
                        Ajouter
                    </button>
                </div>
            </div>
            <!-- Produit 2 -->
            <div class="bg-white rounded-2xl shadow-lg p-4 transform hover:scale-105 transition duration-300">
                <div class="w-full h-32 bg-blue-200 rounded-xl mb-4 flex items-center justify-center">
                    <span class="text-4xl">🌙</span>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Brosse Lune</h3>
                <p class="text-gray-600 text-sm mb-2">Pour cheveux</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-pink-500">15,99€</span>
                    <button class="bg-pink-500 text-white px-3 py-1 rounded-full text-sm hover:bg-pink-600 transition">
                        Ajouter
                    </button>
                </div>
            </div>
            <!-- Produit 3 -->
            <div class="bg-white rounded-2xl shadow-lg p-4 transform hover:scale-105 transition duration-300">
                <div class="w-full h-32 bg-red-200 rounded-xl mb-4 flex items-center justify-center">
                    <span class="text-4xl">🍡</span>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Peluche Dango</h3>
                <p class="text-gray-600 text-sm mb-2">Inspiré des desserts</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-pink-500">18,99€</span>
                    <button class="bg-pink-500 text-white px-3 py-1 rounded-full text-sm hover:bg-pink-600 transition">
                        Ajouter
                    </button>
                </div>
            </div>
            <!-- Produit 4 -->
            <div class="bg-white rounded-2xl shadow-lg p-4 transform hover:scale-105 transition duration-300">
                <div class="w-full h-32 bg-indigo-200 rounded-xl mb-4 flex items-center justify-center">
                    <span class="text-4xl">🦄</span>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Licorne Magique</h3>
                <p class="text-gray-600 text-sm mb-2">Peluche arc-en-ciel</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-pink-500">29,99€</span>
                    <button class="bg-pink-500 text-white px-3 py-1 rounded-full text-sm hover:bg-pink-600 transition">
                        Ajouter
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection