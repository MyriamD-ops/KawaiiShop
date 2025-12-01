<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderCartController;
use App\Http\Controllers\LigneController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;




// Page d'accueil
Route::get('/', function () {
return view('home');
});

// Page de connexion
Route::get('/login2', function () {
    return view('auth.login2');
})->name('login2');

// Page d'inscription (si tu veux)
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Page produit (exemple avec un id)
Route::get('/product/{}', function () {
    // Pour l'instant, on passe l'id à la vue, mais plus tard tu iras chercher le produit en base
    return view('products.show');
})->name('product.show');

// Page panier
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Routes publiques (accessibles sans authentification)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/categories.index', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');




// Routes authentifiées
Route::middleware(['auth'])->group(function () {
// Panier de l'utilisateur
Route::get('/cart', [OrderCartController::class, 'index'])->name('cart.index');
Route::post('/cart/clear', [OrderCartController::class, 'clear'])->name('cart.clear');

// Ajouter un produit au panier
Route::get('/cart/add', [LigneController::class, 'addToCart'])->name('cart.add');

// Lignes du panier
Route::delete('/lines/{line}', [LigneController::class, 'destroy'])->name('lines.destroy');
Route::patch('/lines/{line}', [LigneController::class, 'update'])->name('lines.update');

// Commandes de l'utilisateur
Route::get('/my-orders', [OrderController::class, 'index'])->name('my-orders.index');
Route::get('/my-orders/{order}', [OrderController::class, 'show'])->name('my-orders.show');
});




// Routes administrateur
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

    });



// Gestion des utilisateurs
Route::resource('users', UserController::class);

// Gestion des catégories
Route::resource('category', CategoryController::class);

// Gestion des produits
//Route::resource('products', ProductController::class);

// Gestion des commandes
Route::resource('orders', OrderController::class);
Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');



// Gestion des paniers (admin)
Route::get('/cart.index', [OrderCartController::class, 'adminIndex'])->name('cart.index');
Route::get('order-carts/{orderCart}', [OrderCartController::class, 'show'])->name('order-carts.show');
Route::delete('order-carts/{orderCart}', [OrderCartController::class, 'destroy'])->name('order-carts.destroy');

// Gestion des lignes (admin)
Route::resource('lignes', LigneController::class);

// Dashboard admin
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
