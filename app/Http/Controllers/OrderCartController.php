<?php

namespace App\Http\Controllers;

use App\Models\OrderCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderCartController extends Controller
{
    public function index()
    {
        $cartItems = OrderCart::with('product')
            ->where('users_id', Auth::id())
            ->get();
            
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, Product $product)
    {
        $cartItem = OrderCart::where('users_id', Auth::id())
            ->where('products_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantite');
        } else {
            OrderCart::create([
                'users_id' => Auth::id(),
                'products_id' => $product->id,
                'quantite' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }

    public function update(Request $request, OrderCart $cartItem)
    {
        if ($request->action === 'increase') {
            $cartItem->increment('quantite');
        } elseif ($request->action === 'decrease' && $cartItem->quantite > 1) {
            $cartItem->decrement('quantite');
        } elseif (isset($request->quantite)) {
            $cartItem->update(['quantite' => $request->quantite]);
        }

        return redirect()->back()->with('success', 'Panier mis à jour');
    }

    public function destroy(OrderCart $cartItem)
    {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Article retiré du panier');
    }

    public function clear()
    {
        OrderCart::where('users_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Panier vidé');
    }
}