<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div>
        <!-- Liens de navigation -->
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <div class="flex items-center space-x-6">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-pink-500 transition">Accueil</a>
                <a href="{{ url('/products') }}" class="text-gray-600 hover:text-pink-500 transition">Produits</a>
                <a href="{{ url('/categories') }}" class="text-gray-600 hover:text-pink-500 transition">Catégories</a>
                <a href="{{ url('/admin') }}" class="text-gray-600 hover:text-pink-500 transition">Administrateur</a> 


    </div>
</x-app-layout>
