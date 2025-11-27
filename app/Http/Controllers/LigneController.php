<?php

namespace App\Http\Controllers;

use App\Models\Ligne;
use App\Models\Order;
use App\Models\OrderCart;
use App\Models\Product;
use Illuminate\Http\Request;

class LigneController extends Controller
{
    // Afficher la liste des lignes
    public function index()
    {
        $lignes = Ligne::with('order', 'orderCart', 'product')->paginate(15);
        return view('lignes.index', compact('lignes'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $orders = Order::all();
        $orderCarts = OrderCart::all();
        $products = Product::all();
        
        return view('lignes.create', compact('orders', 'orderCarts', 'products'));
    }

    // Enregistrer une nouvelle ligne
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => ['nullable', 'exists:orders,id'],
            'order_cart_id' => ['nullable', 'exists:order_carts,id'],
            'product_id' => ['required', 'exists:products,id'],
            'quantite' => ['required', 'integer', 'min:1'],
            'montant' => ['required', 'numeric', 'min:0'],
            'date' => ['required', 'date'],
        ]);

        // Vérifier qu'au moins order_id ou order_cart_id est fourni
        if (empty($validated['order_id']) && empty($validated['order_cart_id'])) {
            return redirect()->back()
                ->with('error', 'Une ligne doit être associée à une commande ou un panier.');
        }

        $ligne = Ligne::create($validated);

        return redirect()->back()
            ->with('success', 'Ligne ajoutée avec succès.');
    }

    // Ajouter un produit au panier
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'order_cart_id' => ['required', 'exists:order_carts,id'],
            'product_id' => ['required', 'exists:products,id'],
            'quantite' => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($validated['product_id']);
        
        // Vérifier si le produit existe déjà dans le panier
        $existingLigne = Ligne::where('order_cart_id', $validated['order_cart_id'])
            ->where('product_id', $validated['product_id'])
            ->first();

        if ($existingLigne) {
            // Mettre à jour la quantité et le montant
            $existingLigne->quantite += $validated['quantite'];
            $existingLigne->montant = $existingLigne->quantite * $product->prix;
            $existingLigne->save();
        } else {
            // Créer une nouvelle ligne
            Ligne::create([
                'order_cart_id' => $validated['order_cart_id'],
                'product_id' => $validated['product_id'],
                'quantite' => $validated['quantite'],
                'montant' => $validated['quantite'] * $product->prix,
                'date' => now(),
            ]);
        }

        // Mettre à jour la quantité totale du panier
        $orderCart = OrderCart::findOrFail($validated['order_cart_id']);
        $orderCart->quantite = $orderCart->lines()->sum('quantite');
        $orderCart->save();

        return redirect()->back()
            ->with('success', 'Produit ajouté au panier avec succès.');
    }

    // Afficher une ligne spécifique
    public function show(Ligne $ligne)
    {
        $ligne->load('order', 'orderCart', 'product');
        return view('lignes.show', compact('ligne'));
    }

    // Afficher le formulaire d'édition
    public function edit(Ligne $ligne)
    {
        $orders = Order::all();
        $orderCarts = OrderCart::all();
        $products = Product::all();
        
        return view('lignes.edit', compact('ligne', 'orders', 'orderCarts', 'products'));
    }

    // Mettre à jour une ligne
    public function update(Request $request, Ligne $ligne)
    {
        $validated = $request->validate([
            'order_id' => ['nullable', 'exists:orders,id'],
            'order_cart_id' => ['nullable', 'exists:order_carts,id'],
            'product_id' => ['required', 'exists:products,id'],
            'quantite' => ['required', 'integer', 'min:1'],
            'montant' => ['required', 'numeric', 'min:0'],
            'date' => ['required', 'date'],
        ]);

        $ligne->update($validated);

        // Mettre à jour la quantité totale du panier si applicable
        if ($ligne->order_cart_id) {
            $orderCart = OrderCart::findOrFail($ligne->order_cart_id);
            $orderCart->quantite = $orderCart->lines()->sum('quantite');
            $orderCart->save();
        }

        return redirect()->back()
            ->with('success', 'Ligne mise à jour avec succès.');
    }

    // Supprimer une ligne
    public function destroy(Ligne $ligne)
    {
        $orderCartId = $ligne->order_cart_id;
        
        $ligne->delete();

        // Mettre à jour la quantité totale du panier si applicable
        if ($orderCartId) {
            $orderCart = OrderCart::findOrFail($orderCartId);
            $orderCart->quantite = $orderCart->lignes()->sum('quantite');
            $orderCart->save();
        }

        return redirect()->back()
            ->with('success', 'Ligne supprimée avec succès.');
    }
}