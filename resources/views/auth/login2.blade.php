@extends('layouts.app2')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-8">
    <!-- En-tête de la page -->
    <div class="text-center mb-8">
        <span class="text-5xl mb-4 block">🔐</span>
        <h2 class="text-3xl font-bold text-gray-800">Connexion</h2>
        <p class="text-gray-600 mt-2">Accède à ton compte kawaii</p>
    </div>

    <!-- Formulaire de connexion -->
    <form method="POST" action="{{ route('login') }}">
        @csrf <!-- Token de sécurité Laravel -->
        
        <!-- Champ Email -->
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="email">📧 Email</label>
            <input type="email" id="email" name="email" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 transition"
                   placeholder="ton@email.com" required>
        </div>

        <!-- Champ Mot de passe -->
        <div class="mb-6">
            <label class="block text-gray-700 mb-2" for="password">🔒 Mot de passe</label>
            <input type="password" id="password" name="password" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 transition"
                   placeholder="••••••••" required>
        </div>

        <!-- Bouton de connexion -->
        <button type="submit" 
                class="w-full bg-pink-500 text-white py-3 rounded-xl font-bold text-lg hover:bg-pink-600 transition mb-4">
            Se connecter 🎀
        </button>

        <!-- Lien vers l'inscription -->
        <div class="text-center">
            <p class="text-gray-600">
                Pas de compte ? 
                <a href="{{ route('register') }}" class="text-pink-500 hover:text-pink-600 font-bold">
                    Crée-en un !
                </a>
            </p>
        </div>
    </form>
</div>
@endsection