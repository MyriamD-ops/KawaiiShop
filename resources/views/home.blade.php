@extends('layouts.app2')

@section('content')
<?php
// ================================================
// RÉCUPÉRATION DES DONNÉES
// ================================================
// Note : Ce code devrait normalement être dans un Controller
// Pour l'instant, on récupère les produits directement dans la vue
use App\Models\Product;
use App\Models\Category;

// Récupérer les 3 produits les plus récents (nouveautés)
$newProducts = Product::orderBy('created_at', 'desc')->take(3)->get();

// Récupérer tous les produits (pour la section "Tous nos produits")
$allProducts = Product::all();

// Récupérer les catégories avec le nombre de produits dans chaque catégorie
$categories = Category::withCount('products')->get();
?>

<!-- ================================================ -->
<!-- SECTION HERO - BANNIÈRE PRINCIPALE -->
<!-- ================================================ -->
<section class="mb-16">
    <div class="bg-gradient-to-r from-pink-400 to-purple-400 rounded-3xl p-8 text-white text-center shadow-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 animate-pulse">Bienvenue dans notre univers kawaii ! 🎀</h2>
        <p class="text-xl md:text-2xl mb-6">Découvrez {{ $allProducts->count() }} produits adorables</p>
        <a href="#products" class="inline-block bg-white text-pink-500 px-8 py-3 rounded-full font-bold text-lg hover:bg-pink-100 transition transform hover:scale-105 shadow-md">
            Découvrir nos trésors 🎀
        </a>
    </div>
</section>

<!-- ================================================ -->
<!-- SECTION NOUVEAUTÉS - AMÉLIORÉE -->
<!-- ================================================ -->
<section class="mb-16">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            <span class="mr-3 bg-pink-500 text-white p-2 rounded-full">🆕</span> Nos Nouveautés
        </h2>
        <a href="{{ route('products.index') }}" class="text-pink-500 hover:text-pink-600 font-medium flex items-center">
            Voir tout <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    
    <!-- Conteneur des nouveaux produits -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($newProducts as $product)
        <div class="group relative">
            <!-- Carte du produit avec effet "pill" arrondi -->
            <div class="bg-white rounded-[2rem] shadow-xl p-6 transform hover:scale-[1.02] transition duration-300 border border-pink-100 hover:border-pink-300">
                <!-- Badge "Nouveau" -->
                <div class="absolute top-4 right-4 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                    NOUVEAU
                </div>
                
                <!-- Image du produit -->
                <div class="w-full h-56 bg-gradient-to-br from-pink-100 to-purple-100 rounded-[1.5rem] mb-6 flex items-center justify-center overflow-hidden group-hover:from-pink-200 group-hover:to-purple-200 transition">
                    @if($product->image)
                     <img src="{{ url('images/photo.jpg') }}" 
                        alt="Photo"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @else
                        <div class="text-center">
                            <span class="text-6xl mb-2 block">🛍️</span>
                            <p class="text-pink-500 text-sm">Image à venir</p>
                        </div>
                    @endif
                </div>
                
                <!-- Informations du produit -->
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-pink-600 transition">
                    {{ $product->name }}
                </h3>
                
                <!-- Description courte -->
                <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                    {{ Str::limit($product->description, 80) }}
                </p>
                
                <!-- Prix et bouton -->
                <div class="flex justify-between items-center mt-6">
                    <div>
                        <span class="text-2xl font-bold text-pink-500">{{ number_format($product->prix, 2) }} €</span>
                        @if($product->prix_original)
                            <span class="text-gray-400 line-through text-sm ml-2">{{ number_format($product->prix_original, 2) }} €</span>
                        @endif
                    </div>
                    <a href="{{ route('products.show', $product->id) }}" 
                       class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-5 py-2 rounded-full hover:from-pink-600 hover:to-purple-600 transition transform hover:scale-105 shadow-md flex items-center">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Ajouter
                    </a>
                </div>
                
                <!-- Étoiles de notation -->
                <div class="flex items-center mt-4">
                    <div class="flex text-yellow-400">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= 4)
                                <i class="fas fa-star text-sm"></i>
                            @else
                                <i class="fas fa-star-half-alt text-sm"></i>
                            @endif
                        @endfor
                    </div>
                    <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- ================================================ -->
<!-- SECTION CATÉGORIES - AMÉLIORÉE -->
<!-- ================================================ -->
<section class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Explorez par Catégories</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Parcourez nos collections organisées par thème. Chaque catégorie est une aventure kawaii unique !
        </p>
    </div>
    
    <!-- Grille des catégories -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($categories as $category)
        <a href="{{ route('categories.index', $category->id) }}" 
           class="group block transform hover:scale-105 transition duration-300">
           
            <!-- Carte de catégorie -->
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-6 text-center shadow-lg hover:shadow-2xl transition h-full border border-transparent hover:border-pink-200">
                
                <!-- Icône de la catégorie -->
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-pink-200 to-purple-200 flex items-center justify-center group-hover:from-pink-300 group-hover:to-purple-300 transition">
                    <span class="text-3xl">
                        @php
                            // Déterminer l'icône en fonction du nom de la catégorie
                            $icon = '🛍️'; // Icône par défaut
                            $name = strtolower($category->name);
                            
                            if (str_contains($name, 'plush') || str_contains($name, 'peluche')) {
                                $icon = '🧸';
                            } elseif (str_contains($name, 'papeterie') || str_contains($name, 'cahier')) {
                                $icon = '📓';
                            } elseif (str_contains($name, 'accessoire') || str_contains($name, 'bijou')) {
                                $icon = '🎀';
                            } elseif (str_contains($name, 'vetement') || str_contains($name, 'vêtement')) {
                                $icon = '👕';
                            } elseif (str_contains($name, 'decoration') || str_contains($name, 'déco')) {
                                $icon = '🏠';
                            }
                        @endphp
                        {{ $icon }}
                    </span>
                </div>
                
                <!-- Nom de la catégorie -->
                <h3 class="font-bold text-gray-800 text-lg mb-2 group-hover:text-pink-600 transition capitalize">
                    {{ $category->name }}
                </h3>
                
                <!-- Nombre de produits -->
                <div class="inline-flex items-center justify-center w-10 h-10 mx-auto rounded-full bg-pink-500 text-white text-sm font-bold">
                    {{ $category->products_count }}
                </div>
                
                <!-- Sous-titre descriptif -->
                <p class="text-gray-600 text-sm mt-3">
                    @php
                        // Description basée sur la catégorie
                        $description = 'Produits adorables';
                        $name = strtolower($category->name);
                        
                        if (str_contains($name, 'plush') || str_contains($name, 'peluche')) {
                            $description = 'Peluches douces';
                        } elseif (str_contains($name, 'papeterie') || str_contains($name, 'cahier')) {
                            $description = 'Fournitures mignonnes';
                        } elseif (str_contains($name, 'accessoire') || str_contains($name, 'bijou')) {
                            $description = 'Accessoires kawaii';
                        } elseif (str_contains($name, 'vetement') || str_contains($name, 'vêtement')) {
                            $description = 'Vêtements style';
                        } elseif (str_contains($name, 'decoration') || str_contains($name, 'déco')) {
                            $description = 'Décoration charmante';
                        }
                    @endphp
                    {{ $description }}
                </p>
                
                <!-- Bouton de découverte -->
                <div class="mt-4">
                    <span class="inline-block text-pink-500 text-sm font-medium group-hover:translate-x-1 transition">
                        Découvrir <i class="fas fa-arrow-right ml-1"></i>
                    </span>
                </div>
            </div>
        </a>
        @endforeach
        
        <!-- Catégorie "Tout voir" -->
        <a href="{{ route('products.index') }}" class="group block transform hover:scale-105 transition duration-300">
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 text-center shadow-lg hover:shadow-2xl transition h-full border-2 border-dashed border-gray-300 hover:border-pink-300">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center group-hover:from-pink-200 group-hover:to-purple-200 transition">
                    <span class="text-3xl">✨</span>
                </div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Tout voir</h3>
                <p class="text-gray-600 text-sm mt-3">Tous nos produits</p>
                <div class="mt-4">
                    <span class="inline-block text-gray-500 group-hover:text-pink-500 text-sm font-medium transition">
                        Explorer <i class="fas fa-search ml-1"></i>
                    </span>
                </div>
            </div>
        </a>
    </div>
</section>

<!-- ================================================ -->
<!-- SECTION TOUS LES PRODUITS -->
<!-- ================================================ -->
<section id="products" class="mb-16">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            <span class="mr-3 bg-purple-500 text-white p-2 rounded-full">⭐</span> Tous nos produits
        </h2>
        <div class="flex space-x-4">
            <select class="bg-white border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500">
                <option>Trier par : Nouveautés</option>
                <option>Prix croissant</option>
                <option>Prix décroissant</option>
                <option>Populaires</option>
            </select>
        </div>
    </div>
    
    <!-- Grille des produits -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($allProducts as $product)
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition p-4 transform hover:scale-[1.02] border border-transparent hover:border-pink-200">
            <!-- Image du produit -->
            <div class="w-full h-48 bg-gradient-to-br from-pink-100 to-purple-100 rounded-xl mb-4 overflow-hidden">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-cover hover:scale-110 transition duration-500">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="text-5xl">🎁</span>
                    </div>
                @endif
            </div>
            
            <!-- Catégorie du produit -->
            <div class="mb-2">
                @if($product->category)
                    <span class="inline-block bg-pink-100 text-pink-600 text-xs px-2 py-1 rounded-full">
                        {{ $product->category->name }}
                    </span>
                @endif
            </div>
            
            <!-- Nom et prix du produit -->
            <h3 class="font-bold text-gray-800 mb-2 line-clamp-1">{{ $product->name }}</h3>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit($product->description, 60) }}</p>
            
            <div class="flex justify-between items-center">
                <span class="text-xl font-bold text-pink-500">{{ number_format($product->prix, 2) }} €</span>
                <a href="{{ route('products.show', $product->id) }}" 
                   class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full text-sm font-medium transition flex items-center">
                    <i class="fas fa-eye mr-1"></i> Voir
                </a>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Bouton "Voir plus" -->
    <div class="text-center mt-12">
        <a href="{{ route('products.index') }}" 
           class="inline-block bg-gradient-to-r from-pink-500 to-purple-500 text-white px-8 py-3 rounded-full font-bold hover:from-pink-600 hover:to-purple-600 transition transform hover:scale-105 shadow-lg">
            <i class="fas fa-gem mr-2"></i> Voir tous nos trésors
        </a>
    </div>
</section>

<!-- ================================================ -->
<!-- SECTION NEWSLETTER -->
<!-- ================================================ -->
<section class="mb-16">
    <div class="bg-gradient-to-r from-pink-300 to-purple-300 rounded-3xl p-8 text-center shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">🎀 Ne manquez pas nos nouveautés !</h2>
        <p class="text-gray-700 mb-6 max-w-lg mx-auto">
            Inscrivez-vous à notre newsletter pour recevoir en avant-première nos nouvelles collections et offres spéciales.
        </p>
        <form class="max-w-md mx-auto flex">
            <input type="email" 
                   placeholder="Votre email kawaii" 
                   class="flex-grow px-4 py-3 rounded-l-full focus:outline-none focus:ring-2 focus:ring-pink-500">
            <button type="submit" 
                    class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-r-full font-bold transition">
                S'abonner ✨
            </button>
        </form>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Animation pour le coeur */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    /* Style pour limiter le nombre de lignes */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Effet de brillance sur les cartes */
    .group:hover .shine-effect {
        animation: shine 2s ease-in-out infinite;
    }
    
    @keyframes shine {
        0% { opacity: 0.5; }
        50% { opacity: 1; }
        100% { opacity: 0.5; }
    }
</style>
@endpush