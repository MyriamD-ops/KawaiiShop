@extends('layouts.app2')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Image du produit -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="w-full h-96 bg-pink-100 rounded-xl flex items-center justify-center">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-xl">
            </div>
        </div>

        <!-- Détails du produit -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
            <p class="text-2xl font-bold text-pink-500 mb-6">{{ $product->prix }}€</p>
            
            <!-- Description -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">🎀 Description</h3>
                <p class="text-gray-600">{{ $product->description }}</p>
            </div>

            <!-- Sélecteur de quantité -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Quantité</label>
                <div class="flex items-center space-x-4">
                    <button id="decrease" type="button"
                        class="w-10 h-10 rounded-full bg-pink-200 text-pink-700 flex items-center justify-center hover:bg-pink-300">-</button>
                    
                    <span id="quantityDisplay" class="text-xl font-bold">1</span>
                    
                    <button id="increase" type="button"
                        class="w-10 h-10 rounded-full bg-pink-200 text-pink-700 flex items-center justify-center hover:bg-pink-300">+</button>
                </div>
            </div>

            <!-- Formulaire d'ajout au panier -->
            <form action="{{ route('cart.store', $product) }}" method="POST">
                @csrf
                <input type="hidden" name="users_id" value="{{ auth()->id() }}">
                <input type="hidden" name="products_id" value="{{ $product->id }}">
                <input type="hidden" name="quantite" id="quantityInput" value="1">

                <!-- Boutons d'action -->
                <div class="space-y-4">
                    <button type="submit" class="w-full bg-pink-500 text-white py-4 rounded-xl font-bold text-lg hover:bg-pink-600 transition flex items-center justify-center">
                        🛒 Ajouter au panier
                    </button>
                </div>
            </form>

            <button class="w-full border-2 border-pink-500 text-pink-500 py-4 rounded-xl font-bold text-lg hover:bg-pink-50 transition flex items-center justify-center mt-4">
                <span class="mr-2">💖</span> Ajouter aux favoris
            </button>
        </div>
    </div>
</div>

<script>
const quantityDisplay = document.getElementById('quantityDisplay');
const quantityInput = document.getElementById('quantityInput');
const increaseBtn = document.getElementById('increase');
const decreaseBtn = document.getElementById('decrease');

let quantity = 1;

increaseBtn.addEventListener('click', () => {
    quantity++;
    quantityDisplay.textContent = quantity;
    quantityInput.value = quantity;
});

decreaseBtn.addEventListener('click', () => {
    if (quantity > 1) {
        quantity--;
        quantityDisplay.textContent = quantity;
        quantityInput.value = quantity;
    }
});
</script>
@endsection