<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartphone Ultra Pro Max - Kawaii Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#1e40af',
                        accent: '#ef4444',
                        dark: '#1f2937',
                        light: '#f9fafb'
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-in': 'slideIn 0.5s ease-out',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        bounceGentle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .image-gallery {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f1f5f9;
        }
        
        .image-gallery::-webkit-scrollbar {
            height: 6px;
        }
        
        .image-gallery::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        
        .image-gallery::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        
        .image-gallery::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        .promo-badge {
            position: relative;
            overflow: hidden;
        }
        
        .promo-badge::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation (x-navigation) -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <div class="w-8 h-8 bg-blue-600 rounded-full"></div>
                    <span class="text-xl font-bold text-gray-800">KAWAII SHOP</span>
                </div>
                
                <nav class="w-full md:w-auto">
                    <ul class="flex flex-wrap justify-center space-x-4 md:space-x-6">
                        <li><a href="/order" class="text-gray-600 hover:text-blue-600 font-medium transition">Accueil</a></li>
                        <li><a href="/products" class="text-gray-600 hover:text-blue-600 font-medium transition">Produits</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Nouveautés</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Promotions</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Contact</a></li>
                    </ul>
                </nav>
                
                <div class="flex items-center space-x-4 mt-4 md:mt-0">
                    <button class="text-gray-600 hover:text-blue-600">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="text-gray-600 hover:text-blue-600">
                        <i class="fas fa-user"></i>
                    </button>
                    <button class="text-gray-600 hover:text-blue-600 relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Fil d'Ariane (x-fil-ariane) -->
    <div class="container mx-auto px-4 py-4">
        <nav class="text-sm text-gray-500 mb-6">
            <a href="/order" class="hover:text-blue-600">Accueil</a> / 
            <a href="#" class="hover:text-blue-600">Électronique</a> / 
            <a href="#" class="hover:text-blue-600">Smartphones</a> / 
            <span class="text-gray-800 font-medium">Smartphone Ultra Pro Max</span>
        </nav>
    </div>

    <!-- Hero Section (x-hero-section) -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-100 py-8 mb-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Smartphone Ultra Pro Max</h1>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto">Découvrez l'excellence technologique avec notre dernier smartphone haut de gamme</p>
        </div>
    </div>

    <!-- Categories (x-categories) -->
    @foreach ($categories as $category)
        <div class="container mx-auto px-4 mb-8">
            <a href="#" class="bg-white rounded-lg shadow-md p-4 flex items-center space-x-4 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="{{ $category->icon }} text-2xl text-gray-600"></i>
                </div>
                <span class="font-medium text-gray-800">{{ $category->name }}</span>
                <span class="font-medium text-gray-800"> {{ $category->products->count() }}</span>
            </a>
        </div>
        
    @endforeach

    <div class="container mx-auto px-4 mb-12">
        <h2 class="text-2xl font-bold mb-6 text-center">Catégories populaires</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-mobile-alt text-blue-600"></i>
                </div>
                <span class="font-medium">Smartphones</span>
            </a>
            <a href="#" class="bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-laptop text-green-600"></i>
                </div>
                <span class="font-medium">Ordinateurs</span>
            </a>
            <a href="#" class="bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-tablet-alt text-purple-600"></i>
                </div>
                <span class="font-medium">Tablettes</span>
            </a>
            <a href="#" class="bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-headphones text-red-600"></i>
                </div>
                <span class="font-medium">Accessoires</span>
            </a>
        </div>
    </div>

    <!-- Contenu principal (@yield('contents')) -->
    <div class="container mx-auto px-4 py-8">
        <!-- Détails du produit -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-12 animate-fade-in">
            <div class="flex flex-col lg:flex-row">
                <!-- Images du produit avec carrousel -->
                <div class="lg:w-1/2 p-6">
                    <div class="mb-4 bg-gray-100 rounded-lg p-4 flex items-center justify-center h-96">
                        <img id="main-image" src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                             alt="Smartphone Ultra Pro Max" class="w-full h-full object-contain transition duration-300">
                    </div>
                    
                    <div class="image-gallery flex space-x-2 overflow-x-auto py-2">
                        <div class="flex-shrink-0 w-20 h-20 border-2 border-blue-500 rounded-lg overflow-hidden cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 alt="Vue 1" class="w-full h-full object-cover" 
                                 onclick="document.getElementById('main-image').src = this.src">
                        </div>
                        <div class="flex-shrink-0 w-20 h-20 border rounded-lg overflow-hidden cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 alt="Vue 2" class="w-full h-full object-cover" 
                                 onclick="document.getElementById('main-image').src = this.src">
                        </div>
                        <div class="flex-shrink-0 w-20 h-20 border rounded-lg overflow-hidden cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 alt="Vue 3" class="w-full h-full object-cover" 
                                 onclick="document.getElementById('main-image').src = this.src">
                        </div>
                        <div class="flex-shrink-0 w-20 h-20 border rounded-lg overflow-hidden cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 alt="Vue 4" class="w-full h-full object-cover" 
                                 onclick="document.getElementById('main-image').src = this.src">
                        </div>
                    </div>
                </div>
                
                <!-- Informations du produit -->
                <div class="lg:w-1/2 p-6 lg:border-l border-gray-200">
                    <div class="mb-2">
                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">En stock</span>
                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full ml-2">Nouveau</span>
                        <span class="inline-block promo-badge bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full ml-2">Promo</span>
                    </div>
                    
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Smartphone Ultra Pro Max</h1>
                    
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-600 ml-2">4.5 (142 avis)</span>
                        <a href="#reviews" class="text-blue-600 ml-4 text-sm hover:underline">Voir les avis</a>
                    </div>
                    
                    <div class="mb-6">
                        <span class="text-3xl font-bold text-red-600">799,99 €</span>
                        <span class="text-lg text-gray-500 line-through ml-2">899,99 €</span>
                        <span class="inline-block bg-red-100 text-red-800 text-sm font-medium px-2 py-1 rounded ml-2">-11%</span>
                    </div>
                    
                    <p class="text-gray-700 mb-6">
                        Découvrez notre dernier smartphone haut de gamme avec un écran AMOLED de 6,7 pouces, 
                        un processeur ultra-rapide et un système de caméras professionnel. Profitez d'une 
                        autonomie exceptionnelle et d'une expérience utilisateur fluide.
                    </p>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Caractéristiques principales :</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Écran AMOLED 6,7" 120Hz</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Processeur Octa-core 3.2GHz</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>128 Go de stockage</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Triple caméra 108MP + 12MP + 8MP</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Batterie 5000mAh avec charge rapide</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Couleurs disponibles :</h3>
                        <div class="flex space-x-3">
                            <button class="color-option w-10 h-10 rounded-full bg-black border-2 border-gray-300 focus:border-blue-500 transition" data-color="noir"></button>
                            <button class="color-option w-10 h-10 rounded-full bg-blue-500 border-2 border-gray-300 focus:border-blue-500 transition" data-color="bleu"></button>
                            <button class="color-option w-10 h-10 rounded-full bg-purple-500 border-2 border-gray-300 focus:border-blue-500 transition" data-color="violet"></button>
                            <button class="color-option w-10 h-10 rounded-full bg-green-500 border-2 border-gray-300 focus:border-blue-500 transition" data-color="vert"></button>
                        </div>
                        <p id="selected-color" class="text-gray-600 mt-2">Couleur sélectionnée: <span class="font-medium">Noir</span></p>
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <label class="text-lg font-semibold mr-4">Quantité :</label>
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button id="decrease-qty" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" id="quantity" value="1" min="1" max="10" class="w-12 text-center border-0 focus:ring-0">
                                <button id="increase-qty" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                            <button class="add-to-cart flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-semibold transition flex items-center justify-center">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Ajouter au panier
                            </button>
                            <button class="buy-now flex-1 bg-red-600 hover:bg-red-700 text-white py-3 px-6 rounded-lg font-semibold transition flex items-center justify-center">
                                <i class="fas fa-bolt mr-2"></i>
                                Acheter maintenant
                            </button>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-shipping-fast mr-2 text-green-500"></i>
                            <span>Livraison gratuite à partir de 50€</span>
                        </div>
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-undo-alt mr-2 text-blue-500"></i>
                            <span>Retours gratuits sous 30 jours</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-shield-alt mr-2 text-purple-500"></i>
                            <span>Garantie 2 ans incluse</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Détails supplémentaires avec onglets -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-12 animate-slide-in">
            <div class="border-b border-gray-200">
                <div class="flex overflow-x-auto">
                    <button class="tab-button py-4 px-6 font-medium border-b-2 border-blue-500 text-blue-500">Description</button>
                    <button class="tab-button py-4 px-6 font-medium text-gray-500 hover:text-gray-700">Spécifications</button>
                    <button class="tab-button py-4 px-6 font-medium text-gray-500 hover:text-gray-700">Avis clients</button>
                    <button class="tab-button py-4 px-6 font-medium text-gray-500 hover:text-gray-700">Accessoires</button>
                </div>
            </div>
            
            <div class="p-6">
                <div class="tab-content active">
                    <h3 class="text-xl font-bold mb-4">Description détaillée</h3>
                    <div class="prose max-w-none">
                        <p class="mb-4">
                            Le Smartphone Ultra Pro Max repousse les limites de l'innovation avec son design élégant 
                            et ses performances exceptionnelles. Son écran AMOLED de 6,7 pouces offre des couleurs 
                            vibrantes et des noirs profonds, idéal pour le streaming vidéo et les jeux mobiles.
                        </p>
                        <p class="mb-4">
                            Avec son triple module photo, capturez des moments inoubliables avec une qualité 
                            professionnelle. Le mode nuit amélioré vous permet de prendre des photos nettes même 
                            dans des conditions de faible luminosité.
                        </p>
                        <p class="mb-4">
                            La batterie de 5000mAh assure une autonomie d'une journée complète, même avec une 
                            utilisation intensive. La charge rapide de 65W vous permet de recharger votre appareil 
                            à 50% en seulement 20 minutes.
                        </p>
                    </div>
                </div>
                
                <div class="tab-content hidden">
                    <h3 class="text-xl font-bold mb-4">Spécifications techniques</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="py-3 px-4 font-medium bg-gray-50">Écran</td>
                                    <td class="py-3 px-4">6,7 pouces AMOLED, 120Hz, résolution 2400x1080</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-medium bg-gray-50">Processeur</td>
                                    <td class="py-3 px-4">Octa-core 3.2GHz</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-medium bg-gray-50">Mémoire RAM</td>
                                    <td class="py-3 px-4">8 Go</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-medium bg-gray-50">Stockage</td>
                                    <td class="py-3 px-4">128 Go (non extensible)</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-medium bg-gray-50">Appareil photo principal</td>
                                    <td class="py-3 px-4">Triple capteur: 108MP (wide) + 12MP (ultrawide) + 8MP (telephoto)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="tab-content hidden" id="reviews">
                    <h3 class="text-xl font-bold mb-4">Avis clients</h3>
                    <div class="bg-blue-50 p-4 rounded-lg mb-6">
                        <div class="flex items-center">
                            <div class="text-4xl font-bold text-blue-700 mr-4">4.5/5</div>
                            <div>
                                <div class="flex text-yellow-400 mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <p class="text-blue-800">Basé sur 142 avis clients</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex justify-between mb-2">
                                <h4 class="font-semibold">Marie L.</h4>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-2">Excellent smartphone ! L'autonomie est incroyable et les photos sont d'une qualité exceptionnelle.</p>
                            <p class="text-gray-400 text-sm">Posté il y a 2 jours</p>
                        </div>
                        
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex justify-between mb-2">
                                <h4 class="font-semibold">Thomas B.</h4>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-2">Très satisfait de mon achat. Le seul bémol est le prix un peu élevé, mais la qualité est au rendez-vous.</p>
                            <p class="text-gray-400 text-sm">Posté il y a 1 semaine</p>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content hidden">
                    <h3 class="text-xl font-bold mb-4">Accessoires recommandés</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center border border-gray-200 rounded-lg p-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-headphones text-gray-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Écouteurs Bluetooth</h4>
                                <p class="text-gray-600">29,99 €</p>
                            </div>
                        </div>
                        <div class="flex items-center border border-gray-200 rounded-lg p-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-bolt text-gray-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Chargeur rapide</h4>
                                <p class="text-gray-600">24,99 €</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Produits similaires -->
        <div class="mb-12 animate-fade-in">
            <h2 class="text-2xl font-bold mb-6">Produits similaires</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Produit 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform hover:scale-105">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1592750475338-74b7b21085ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Smartphone Pro Lite" class="h-40 object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Smartphone Pro Lite</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-1">(87)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold">499,99 €</span>
                            <button class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Produit 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform hover:scale-105">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Smartphone Gaming Edition" class="h-40 object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Smartphone Gaming Edition</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-1">(124)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold">649,99 €</span>
                            <button class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Produit 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform hover:scale-105">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-156584 Target.complete la réponse

Voici la suite du code :

```html
                        5840034-23f2e3c6b38c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Smartphone Compact" class="h-40 object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Smartphone Compact</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-1">(56)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold">429,99 €</span>
                            <button class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Produit 4 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform hover:scale-105">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1556656793-08538906a9f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Smartphone Écologique" class="h-40 object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Smartphone Écologique</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-1">(203)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold">569,99 €</span>
                            <button class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pied de page -->
    <footer class="bg-gray-800 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">KAWAII SHOP</h3>
                    <p class="text-gray-400 mb-4">
                        Votre destination shopping en ligne pour les dernières technologies et tendances.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter