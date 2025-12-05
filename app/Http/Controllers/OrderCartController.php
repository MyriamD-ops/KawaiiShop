<?php

namespace App\Http\Controllers;

use App\Models\OrderCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderCartController extends Controller
{
    // Afficher le panier
    public function index()
    {
        $cartItems = OrderCart::with('product')
            ->where('users_id', Auth::id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // Ajouter un produit au panier
   public function store(Request $request, Product $product)
{
    $validated = $request->validate([
        'quantite' => ['required', 'integer', 'min:1'],
    ]);

    $validated['users_id']   = Auth::id();
    $validated['products_id'] = $product->id; // ✅ correspond à ta migration
    $validated['montant']    = $product->prix * $validated['quantite'];

    $existingCartItem = OrderCart::where('users_id', Auth::id())
        ->where('products_id', $product->id) // ✅ idem ici
        ->first();

    if ($existingCartItem) {
        $existingCartItem->quantite += $validated['quantite'];
        $existingCartItem->montant   = $product->prix * $existingCartItem->quantite;
        $existingCartItem->save();
    } else {
        OrderCart::create($validated);
    }

    return redirect()->route('cart.index')
        ->with('success', 'Produit ajouté au panier !');
}



    // Mettre à jour la quantité
   public function update(Request $request, OrderCart $cartItem)
{
    // Vérifier que l'item appartient à l'utilisateur connecté
    if ($cartItem->users_id !== Auth::id()) {
        return redirect()->back()->with('error', 'Action non autorisée.');
    }

    Log::info('Before update', [
        'item_id' => $cartItem->id,
        'current_quantity' => $cartItem->quantite,
        'action' => $request->action,
        'request_all' => $request->all()
    ]);

    if ($request->action === 'increase') {
        $cartItem->quantite = $cartItem->quantite + 1;
    } elseif ($request->action === 'decrease' && $cartItem->quantite > 1) {
        $cartItem->quantite = $cartItem->quantite - 1;
    } elseif ($request->action === 'set' && $request->has('quantite')) {
        $newQuantity = (int) $request->quantite;
        if ($newQuantity >= 1 && $newQuantity <= 99) {
            $cartItem->quantite = $newQuantity;
        }
    }

    // Recalculer le montant
    $cartItem->montant = $cartItem->product->prix * $cartItem->quantite;
    
    // Sauvegarder
    $saved = $cartItem->save();

    Log::info('After update', [
        'saved' => $saved,
        'new_quantity' => $cartItem->quantite,
        'new_montant' => $cartItem->montant
    ]);

    return redirect()->back()->with('success', 'Panier mis à jour ! ✨');
}
}

            // recalcul du montant
            if ($cartItem->product) {
                $cartItem->montant = $cartItem->product->prix * $cartItem->quantite;
            }

            $cartItem->save();

            Log::info('Cart updated successfully', [
                'new_quantity' => $cartItem->quantite,
                'new_montant'  => $cartItem->montant,
            ]);

            return redirect()->back()->with('success', 'Panier mis à jour !');
        } catch (\Exception $e) {
            Log::error('Error updating cart', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour du panier.');
        }
    
    // Supprimer un article
    public function destroy(OrderCart $cartItem)
    {
        if ($cartItem->users_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Action non autorisée.');
        }

        $cartItem->delete();
        return redirect()->back()->with('success', 'Article retiré du panier.');
    }

    // Vider le panier
    public function clear()
    {
        OrderCart::where('users_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Panier vidé !');
    }
}
