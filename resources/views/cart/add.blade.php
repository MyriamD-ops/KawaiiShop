@extends('layouts.app2')

@section('content')

<form action="{{ route('cart.store') }}" method="POST">
    @csrf
    @method(POST)

    <input type="hidden" name="users_id" value="{{ auth()->id() }}">
    <input type="hidden" name="products_id" value="{{ $product->id }}">

    <input type="number" name="quantite" min="1" value="1">

    <button type="submit" class="btn">
        Ajouter au panier
    </button>
</form>


<form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="decrease">
                            <button type="submit" class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300 transition">-</button>
                        </form>
                        
                        <span class="mx-2 font-bold text-lg">{{ $item->quantite }}</span>
                        
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="increase">
                            <button type="submit" class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300 transition">+</button>
                        </form><form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="decrease">
                            <button type="submit" class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300 transition">-</button>
                        </form>
                        
                        <span class="mx-2 font-bold text-lg">{{ $item->quantite }}</span>
                        
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="increase">
                            <button type="submit" class="w-8 h-8 rounded-full bg-pink-200 text-pink-700 hover:bg-pink-300 transition">+</button>
                        </form>
    
@endsection


