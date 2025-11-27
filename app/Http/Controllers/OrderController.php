<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Afficher la liste des commandes
    public function index()
    {
        $orders = Order::with('user', 'lines')->latest('date')->paginate(15);
        return view('orders.index', compact('orders'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $users = User::all();
        return view('orders.create', compact('users'));
    }

    // Enregistrer une nouvelle commande
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'montant' => ['required', 'numeric', 'min:0'],
            'state' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
        ]);

        $order = Order::create($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Commande créée avec succès.');
    }

    // Afficher une commande spécifique
    public function show(Order $order)
    {
        $order->load('user', 'lignes.product');
        return view('orders.show', compact('order'));
    }

    // Afficher le formulaire d'édition
    public function edit(Order $order)
    {
        $users = User::all();
        return view('orders.edit', compact('order', 'users'));
    }

    // Mettre à jour une commande
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'montant' => ['required', 'numeric', 'min:0'],
            'state' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Commande mise à jour avec succès.');
    }

    // Supprimer une commande
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Commande supprimée avec succès.');
    }

    // Méthode pour mettre à jour l'état d'une commande
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'etat' => ['required', 'string', 'max:255'],
        ]);

        $order->update(['state' => $validated['state']]);

        return redirect()->back()
            ->with('success', 'Statut de la commande mis à jour avec succès.');
    }
}