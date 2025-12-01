@extends('layouts.app2')

@section('content')
    <h1 class="text-3xl font-bold mb-6">
        Produits de la catégorie : {{ $category->name }}
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($category->products as $product)
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                <p class="text-gray-600">{{ Str::limit($product->description, 50) }}</p>
                <span class="text-pink-500 font-bold">{{ $product->prix }} €</span>
            </div>
        @endforeach
    </div>
@endsection
