<?php

namespace App\Http\Controllers;

use App\Models\OrderCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderCartController extends Controller
{
    // Afficher le panier de l'utilisateur connecté
    public function index()
    {
        $orderCart = OrderCart::with('lines.product')
            ->where('user_id', Auth::id())
            ->first();

        return view('order-carts.index', compact('orderCart'));
    }

    // Afficher tous les paniers (admin)
    public function adminIndex()
    {
        $orderCarts = OrderCart::with('user', 'lines')->paginate(15);
        return view('order-carts.admin-index', compact('orderCarts'));
    }

    // Créer ou récupérer le panier de l'utilisateur
    public function getOrCreate()
    {
        $orderCart = OrderCart::firstOrCreate(
            ['user_id' => Auth::id()],
            ['quantite' => 0]
        );

        return $orderCart;
    }

    // Afficher le formulaire de création
    public function create()
    {
        $users = User::all();
        return view('order-carts.create', compact('users'));
    }

    // Enregistrer un nouveau panier
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'quantite' => ['required', 'integer', 'min:0'],
        ]);

        $orderCart = OrderCart::create($validated);

        return redirect()->route('order-carts.index')
            ->with('success', 'Panier créé avec succès.');
    }

    // Afficher un panier spécifique
    public function show(OrderCart $orderCart)
    {
        $orderCart->load('user', 'lines.product');
        return view('order-carts.show', compact('orderCart'));
    }

    // Mettre à jour la quantité totale du panier
    public function update(Request $request, OrderCart $orderCart)
    {
        $validated = $request->validate([
            'quantite' => ['required', 'integer', 'min:0'],
        ]);

        $orderCart->update($validated);

        return redirect()->back()
            ->with('success', 'Panier mis à jour avec succès.');
    }

    // Vider le panier
    public function clear(OrderCart $orderCart)
    {
        $orderCart->lignes()->delete();
        $orderCart->update(['quantite' => 0]);

        return redirect()->back()
            ->with('success', 'Panier vidé avec succès.');
    }

    // Supprimer un panier
    public function destroy(OrderCart $orderCart)
    {
        $orderCart->delete();

        return redirect()->route('order-carts.admin-index')
            ->with('success', 'Panier supprimé avec succès.');
    }
}