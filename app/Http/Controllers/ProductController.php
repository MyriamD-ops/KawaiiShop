<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Afficher la liste des produits
    public function index()
    {
        $products = Product::with('category')->paginate(15);
        return view('products.index', compact('products'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Enregistrer un nouveau produit
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'prix' => ['required', 'numeric', 'min:0'],
            'date' => ['nullable', 'date'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('products', 'public');
        }

        $product = Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produit créé avec succès.');
    }

    // Afficher un produit spécifique
    public function show(Product $product)
    {
        $product->load('category', 'lignes');
        return view('products.show', compact('product'));
    }

    // Afficher le formulaire d'édition
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Mettre à jour un produit
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'prix' => ['required', 'numeric', 'min:0'],
            'date' => ['nullable', 'date'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // Gestion de l'upload de la nouvelle photo
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne photo si elle existe
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprimer un produit
    public function destroy(Product $product)
    {
        // Supprimer la photo si elle existe
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}