<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Afficher la liste des catégories
    public function index()
    {
        $categories = Category::withCount('products')->paginate(15);
        return view('category.index', compact('categories'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('categories.create');
    }

    // Enregistrer une nouvelle catégorie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            
        ]);

        $category = Category::create($validated);

        return redirect()->route('category.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    // Afficher les produits par catégorie 
    public function show($id)
{
    $category = Category::with('products')->findOrFail($id);
    return view('category.show', compact('category'));}


    // Afficher le formulaire d'édition
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Mettre à jour une catégorie
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    // Supprimer une catégorie
    public function destroy(Category $category)
    {
        // Vérifier s'il y a des produits associés
        if ($category->products()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car elle contient des produits.');
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }


    
}