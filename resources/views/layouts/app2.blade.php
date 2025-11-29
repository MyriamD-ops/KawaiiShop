<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Boutique Kawaii</title>
    <!-- Intégration de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Police d'écriture mignonne -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-pink-50 min-h-screen">
    <!-- En-tête -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo et nom du site -->
            <div class="flex items-center space-x-2">
                <span class="text-3xl">🌸</span>
                <h1 class="text-2xl font-bold text-pink-500">Kawaii Shop</h1>
            </div>
            
            <!-- Liens de navigation -->
            <div class="flex items-center space-x-6">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-pink-500 transition">Accueil</a>
                <a href="{{ url('/products') }}" class="text-gray-600 hover:text-pink-500 transition">Boutique</a>
                
                <!-- Icônes du panier et du compte -->
                <div class="flex space-x-4">
                    <a href="{{ url('/cart') }}" class="relative">
                        <span class="text-2xl">🛒</span>
                        <!-- Bulle avec le nombre d'articles dans le panier -->
                        <span class="absolute -top-2 -right-2 bg-pink-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">
                            0 <!-- Pour l'instant en dur, plus tard dynamique -->
                        </span>
                    </a>
                    <a href="{{ url('/login') }}" class="text-2xl">👤</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main class="container mx-auto px-4 py-8">
        <!-- Ici va s'insérer le contenu des autres vues -->
        @yield('content')
    </main>

    <!-- Pied de page -->
    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 py-8 text-center text-gray-600">
            <p>✨ Made with love for kawaii things ✨</p>
        </div>
    </footer>
</body>
</html>