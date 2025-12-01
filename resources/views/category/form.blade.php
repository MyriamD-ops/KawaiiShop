<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Mon Projet Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-tags text-white text-lg"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-800">@yield('title')</span>
                </div>
                <nav class="hidden md:block">
                    <ul class="flex space-x-8">
                        <li><a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 transition">Accueil</a></li>
                        <li><a href="{{ url('/categories') }}" class="text-blue-600 font-medium border-b-2 border-blue-600 pb-1">Catégories</a></li>
                        <li><a href="{{ url('/products') }}" class="text-gray-600 hover:text-blue-600 transition">Produits</a></li>
                    </ul>
                </nav>
                <button class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- En-tête -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">@yield('title')</h1>
                <p class="text-gray-600 mt-1">@yield('description')</p>
            </div>

            <!-- Messages d'erreur -->
            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span>Veuillez corriger les erreurs ci-dessous</span>
                </div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Formulaire -->
            <div class="bg-white rounded-lg shadow p-6">
                <form action="@yield('form-action')" method="POST">
                    @csrf
                    @yield('method')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nom de la catégorie <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $category->name ?? '') }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: Électronique, Vêtements...">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4 mt-6">
                        <a href="{{ route('categories.index') }}" 
                           class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Annuler
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition flex items-center">
                            <i class="fas fa-save mr-2"></i>
                            @yield('button-text')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="container mx-auto px-4 py-6">
            <div class="text-center text-gray-600">
                <p>&copy; 2023 Mon Projet Laravel. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>