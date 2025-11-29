@extends('layouts.app2')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 flex items-center">
        <span class="mr-3">🛒</span> Mon Panier
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Articles du panier -->
        <div class="lg:col-span-2 space-y-4">
            <!-- Article 1 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center">
                <div class="w-20 h-20 bg-pink-200 rounded-xl flex items-center justify-center mr-4">
                    <span class="text-2xl">🐰</span>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-gray-800">Peluche Lapin Rose</h3>
                    <p class="text-pink-500 font-bold">24,99€</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300">-</button>
                    <span class="mx-2 font-bold">1</span>
                    <button class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300">+</button>
                </div>
                <button class="ml-4 text-red-500 hover:text-red-700">🗑️</button>
            </div>

            <!-- Article 2 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center">
                <div class="w-20 h-20 bg-purple-200 rounded-xl flex items-center justify-center mr-4">
                    <span class="text-2xl">🐱</span>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-gray-800">Peluche Chat Violet</h3>
                    <p class="text-pink-500 font-bold">22,99€</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300">-</button>
                    <span class="mx-2 font-bold">1</span>
                    <button class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300">+</button>
                </div>
                <button class="ml-4 text-red-500 hover:text-red-700">🗑️</button>
            </div>
        </div>

        <!-- Résumé de commande -->
        <div class="bg-white rounded-2xl shadow-lg p-6 h-fit">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Résumé de commande</h3>
            
            <div class="space-y-2 mb-4">
                <div class="flex justify-between">
                    <span>Sous-total</span>
                    <span>47,98€</span>
                </div>
                <div class="flex justify-between">
                    <span>Livraison</span>
                    <span>4,99€</span>
                </div>
                <div class="flex justify-between text-lg font-bold mt-4 pt-4 border-t">
                    <span>Total</span>
                    <span class="text-pink-500">52,97€</span>
                </div>
            </div>

            <button class="w-full bg-pink-500 text-white py-4 rounded-xl font-bold text-lg hover:bg-pink-600 transition">
                Commander 🎀
            </button>
        </div>
    </div>
</div>
@endsection