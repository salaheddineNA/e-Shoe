@extends('layouts.shop')

@section('title', 'ShoeStore - Chaussures de Qualité')

@section('hero')
    <!-- Hero Section with Background Image -->
    <div class="relative h-[600px] w-full overflow-hidden mb-16">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://p0.piqsels.com/preview/206/873/135/gray-and-black-nike-air-jordan-1-s.jpg" 
                alt="Chaussures Premium" 
                class="w-full h-full object-cover">
            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
            <!-- Additional overlay for better text visibility -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        </div>
        
        <!-- Content -->
        <div class="relative h-full flex items-center px-8 md:px-12 lg:px-20">
            <div class="max-w-4xl">
                <div class="mb-6">
                    <span class="inline-block bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4 animate-pulse">
                        🔥 Collection 2024 - Jusqu'à -50%
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Chaussures
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">
                        Premium
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-2xl leading-relaxed">
                    Découvrez notre collection exclusive de chaussures de qualité supérieure. 
                    Conçues pour le confort, le style et la performance.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 mb-8">
                    <a href="#products" 
                    class="inline-flex items-center justify-center bg-white text-gray-900 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Voir les produits
                    </a>
                    
                    <a href="{{ route('products.promotions') }}" 
                    class="inline-flex items-center justify-center bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-red-600 transition-all transform hover:scale-105 shadow-lg animate-pulse">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        🔥 Promotions
                    </a>
                    
                    <a href="{{ route('cart.index') }}" 
                    class="inline-flex items-center justify-center border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition-all transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Mon panier
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="flex flex-wrap gap-8 text-white">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white/20 backdrop-blur-sm p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold">4.9/5</div>
                            <div class="text-sm text-white/70">Avis clients</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="bg-white/20 backdrop-blur-sm p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold">Livraison</div>
                            <div class="text-sm text-white/70">Gratuite dès 100€</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="bg-white/20 backdrop-blur-sm p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold">Satisfait</div>
                            <div class="text-sm text-white/70">30 jours remboursé</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <!-- Features -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 w-3/5 mx-auto">
        <div class="text-center">
            <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-lg mb-2">Livraison Gratuite</h3>
            <p class="text-gray-600">À partir de 100€ d'achat</p>
        </div>
        
        <div class="text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-lg mb-2">Qualité Garantie</h3>
            <p class="text-gray-600">Produits authentiques</p>
        </div>
        
        <div class="text-center">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-lg mb-2">Paiement Sécurisé</h3>
            <p class="text-gray-600">Paiement à la livraison</p>
        </div>
    </div>


    <!-- Products Section with Filters -->
    <div id="products" class="mb-16">
        <div class="w-4/5 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Filters Sidebar -->
                <aside class="w-full lg:w-80 flex-shrink-0">
                    <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-4">
                        <!-- Filter Header -->
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-black text-gray-900">Filtres</h3>
                            <button onclick="resetFilters()" class="text-sm text-orange-600 hover:text-orange-700 font-medium">
                                Réinitialiser
                            </button>
                        </div>
                        
                        <!-- Search Bar -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Recherche</label>
                            <div class="relative">
                                <input type="text" 
                                    id="searchInput"
                                    placeholder="Rechercher un produit..." 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Fourchette de prix</label>
                            <div class="space-y-3">
                                <div class="flex items-center space-x-3">
                                    <input type="number" 
                                        id="minPrice"
                                        placeholder="Min" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <span class="text-gray-500">-</span>
                                    <input type="number" 
                                        id="maxPrice"
                                        placeholder="Max" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                </div>
                                <input type="range" 
                                    id="priceRange"
                                    min="0" 
                                    max="500" 
                                    value="500"
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-orange-500">
                                <div class="flex justify-between text-xs text-gray-500">
                                    <span>0€</span>
                                    <span id="currentMaxPrice" class="font-semibold text-orange-600">500€</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sizes Filter -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Tailles</label>
                            <div class="grid grid-cols-4 gap-2">
                                @foreach(['36', '37', '38', '39', '40', '41', '42', '43', '44', '45'] as $size)
                                <label class="relative">
                                    <input type="checkbox" value="{{ $size }}" class="size-filter sr-only peer">
                                    <div class="w-full py-2 px-3 text-center border-2 border-gray-200 rounded-lg cursor-pointer hover:border-orange-500 peer-checked:border-orange-500 peer-checked:bg-orange-500 peer-checked:text-white transition-all">
                                        {{ $size }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Colors Filter -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Couleurs</label>
                            <div class="grid grid-cols-6 gap-2">
                                <label class="relative">
                                    <input type="checkbox" value="noir" class="color-filter sr-only peer">
                                    <div class="w-full h-10 bg-black rounded-lg cursor-pointer hover:scale-110 transition-transform peer-checked:ring-2 peer-checked:ring-orange-500 peer-checked:ring-offset-2"></div>
                                </label>
                                <label class="relative">
                                    <input type="checkbox" value="blanc" class="color-filter sr-only peer">
                                    <div class="w-full h-10 bg-white border-2 border-gray-300 rounded-lg cursor-pointer hover:scale-110 transition-transform peer-checked:ring-2 peer-checked:ring-orange-500 peer-checked:ring-offset-2"></div>
                                </label>
                                <label class="relative">
                                    <input type="checkbox" value="rouge" class="color-filter sr-only peer">
                                    <div class="w-full h-10 bg-red-500 rounded-lg cursor-pointer hover:scale-110 transition-transform peer-checked:ring-2 peer-checked:ring-orange-500 peer-checked:ring-offset-2"></div>
                                </label>
                                <label class="relative">
                                    <input type="checkbox" value="bleu" class="color-filter sr-only peer">
                                    <div class="w-full h-10 bg-blue-500 rounded-lg cursor-pointer hover:scale-110 transition-transform peer-checked:ring-2 peer-checked:ring-orange-500 peer-checked:ring-offset-2"></div>
                                </label>
                                <label class="relative">
                                    <input type="checkbox" value="vert" class="color-filter sr-only peer">
                                    <div class="w-full h-10 bg-green-500 rounded-lg cursor-pointer hover:scale-110 transition-transform peer-checked:ring-2 peer-checked:ring-orange-500 peer-checked:ring-offset-2"></div>
                                </label>
                                <label class="relative">
                                    <input type="checkbox" value="gris" class="color-filter sr-only peer">
                                    <div class="w-full h-10 bg-gray-500 rounded-lg cursor-pointer hover:scale-110 transition-transform peer-checked:ring-2 peer-checked:ring-orange-500 peer-checked:ring-offset-2"></div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Brands Filter -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Marques</label>
                            <div class="space-y-2 max-h-48 overflow-y-auto">
                                @foreach(['Nike', 'Adidas', 'Puma', 'New Balance', 'Converse', 'Vans', 'Reebok', 'Jordan'] as $brand)
                                <label class="flex items-center space-x-3 cursor-pointer hover:bg-gray-50 p-2 rounded-lg">
                                    <input type="checkbox" value="{{ $brand }}" class="brand-filter w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                    <span class="text-sm text-gray-700">{{ $brand }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Categories Filter -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Catégories</label>
                            <div class="space-y-2">
                                @foreach(['Running', 'Basketball', 'Lifestyle', 'Training'] as $category)
                                <label class="flex items-center space-x-3 cursor-pointer hover:bg-gray-50 p-2 rounded-lg">
                                    <input type="checkbox" value="{{ strtolower($category) }}" class="category-filter w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                    <span class="text-sm text-gray-700">{{ $category }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Apply Filters Button -->
                        <button onclick="applyFilters()" class="w-full bg-gradient-to-r from-orange-500 to-red-600 text-white py-3 px-4 rounded-xl font-semibold hover:shadow-lg transition-all transform hover:scale-105">
                            Appliquer les filtres
                        </button>
                    </div>
                </aside>
                
                <!-- Main Content -->
                <main class="flex-1">

                    @if($products->isEmpty())
                        <div class="text-center py-12 bg-white rounded-xl shadow-lg">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucun produit disponible</h3>
                            <p class="text-gray-600">Revenez bientôt pour découvrir nos nouveautés!</p>
                        </div>
                    @else
                        
                        <!-- Results Header -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 bg-white rounded-xl p-6 shadow-lg">
                            <div>
                                <h2 class="text-2xl font-black text-gray-900 mb-2">
                                    Tous les produits
                                    <span class="text-lg font-medium text-gray-600">({{ $products->count() }} résultats)</span>
                                </h2>
                                <div id="activeFilters" class="flex flex-wrap gap-2 mt-3">
                                    <!-- Active filters will be displayed here -->
                                </div>
                            </div>
                            
                            <!-- Sort Dropdown -->
                            <div class="flex items-center space-x-4">
                                <label class="text-sm font-medium text-gray-700">Trier par:</label>
                                <select id="sortSelect" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option value="relevance">🎯 Pertinence</option>
                                    <option value="price-asc">💰 Prix croissant</option>
                                    <option value="price-desc">💸 Prix décroissant</option>
                                    <option value="newest">✨ Nouveautés</option>
                                    <option value="bestseller">🔥 Meilleures ventes</option>
                                    <option value="rating">⭐ Note moyenne</option>
                                    <option value="discount">🏷️ Meilleures réductions</option>
                                    <option value="name-asc">📝 Nom A-Z</option>
                                    <option value="name-desc">📝 Nom Z-A</option>
                                </select>
                                
                                <!-- View Toggle -->
                                <div class="flex bg-gray-100 rounded-lg p-1">
                                    <button id="gridView" class="px-3 py-1 rounded bg-white shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                        </svg>
                                    </button>
                                    <button id="listView" class="px-3 py-1 rounded">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sale Products Section -->
                        @if(!$saleProducts->isEmpty())
                            <div class="mb-12">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-gradient-to-r from-orange-500 to-red-600  text-white p-3 rounded-lg">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="text-2xl font-bold text-gray-900">Offres Spéciales</h2>
                                            <p class="text-gray-600">Profitez de nos meilleures promotions</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                                        <span>{{ $saleProducts->count() }} produit(s)</span>
                                        <span>•</span>
                                        <span class="text-green-600 font-semibold">Jusqu'à -50%</span>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                    @foreach($saleProducts as $index => $product)
                                        <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden fade-in border-2 border-red-200 hover:shadow-xl transition-shadow" style="animation-delay: {{ $index * 0.1 }}s">
                                    <div class="relative group">
                                        <img src="{{ $product->getMainImage() }}" alt="{{ $product->name }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                        
                                        <!-- Badges -->
                                        <div class="absolute top-4 left-4 space-y-2">
                                            @if($product->isCurrentlyOnSale())
                                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold animate-pulse">
                                                    -{{ $product->getDiscountPercentage() }}%
                                                </span>
                                            @endif
                                            @if($product->stock_quantity <= 5 && $product->stock_quantity > 0)
                                                <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                                    Plus que {{ $product->stock_quantity }}
                                                </span>
                                            @elseif($product->stock_quantity == 0)
                                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                                    Rupture
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <!-- Quick actions -->
                                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button class="bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 transition-colors">
                                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="p-6">
                                        <div class="mb-4">
                                            <p class="text-sm text-purple-600 font-semibold mb-1">{{ $product->brand }}</p>
                                            <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $product->name }}</h3>
                                            <div class="flex items-center text-sm text-gray-600 space-x-4">
                                                <span>{{ $product->color }}</span>
                                                <span>•</span>
                                                <span>Taille {{ $product->size }}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center justify-between mb-4">
                                            <div>
                                                @if($product->isCurrentlyOnSale())
                                                    <div class="flex items-center space-x-2">
                                                        <span class="text-2xl font-bold text-green-600">{{ $product->getFormattedCurrentPrice() }}</span>
                                                        <span class="text-lg text-gray-400 line-through">{{ $product->getFormattedOriginalPrice() }}</span>
                                                    </div>
                                                    @if($product->sale_description)
                                                        <p class="text-xs text-red-600 font-semibold mt-1">{{ $product->sale_description }}</p>
                                                    @endif
                                                @else
                                                    <span class="text-2xl font-bold text-gray-900">{{ $product->getFormattedCurrentPrice() }}</span>
                                                @endif
                                                
                                                @if($product->stock_quantity > 0)
                                                    <span class="text-green-600 text-sm block">En stock</span>
                                                @else
                                                    <span class="text-red-600 text-sm block">Indisponible</span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="space-y-3">
                                            <a href="{{ route('products.show', $product->slug) }}" 
                                            class="block w-full bg-gradient-to-r from-orange-500 to-red-600 text-white text-center py-3 px-4 rounded-lg font-medium hover:bg-gray-200 transition-all transform hover:scale-105">
                                                Voir les détails
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                </div>
                                
                                <!-- Pagination for sale products -->
                                <div class="mt-8 flex justify-center">
                                    {{ $saleProducts->links() }}
                                </div>
                            </div>
                        @endif
                        
                        <!-- Regular Products Section -->
                        @if(!$regularProducts->isEmpty())
                            <div class="mb-12">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-blue-500 text-white p-3 rounded-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="text-2xl font-bold text-gray-900">Collection Complète</h2>
                                            <p class="text-gray-600">Découvrez toute notre gamme de produits</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                                        <span>{{ $regularProducts->count() }} produit(s)</span>
                                        <span>•</span>
                                        <span class="text-blue-600 font-semibold">Nouveautés incluses</span>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                    @foreach($regularProducts as $index => $product)
                                        <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden fade-in hover:shadow-xl transition-shadow" style="animation-delay: {{ $index * 0.1 }}s">
                                            <div class="relative group">
                                                <img src="{{ $product->getMainImage() }}" alt="{{ $product->name }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                                
                                                <!-- Badges -->
                                                <div class="absolute top-4 left-4 space-y-2">
                                                    @if($product->stock_quantity <= 5 && $product->stock_quantity > 0)
                                                        <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                                            Plus que {{ $product->stock_quantity }}
                                                        </span>
                                                    @elseif($product->stock_quantity == 0)
                                                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                                            Rupture
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                <!-- Quick actions -->
                                                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <button class="bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 transition-colors">
                                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <div class="p-6">
                                                <div class="mb-4">
                                                    <p class="text-sm text-purple-600 font-semibold mb-1">{{ $product->brand }}</p>
                                                    <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $product->name }}</h3>
                                                    <div class="flex items-center text-sm text-gray-600 space-x-4">
                                                        <span>{{ $product->color }}</span>
                                                        <span>•</span>
                                                        <span>Taille {{ $product->size }}</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="flex items-center justify-between mb-4">
                                                    <div>
                                                        <span class="text-2xl font-bold text-gray-900">{{ $product->getFormattedCurrentPrice() }}</span>
                                                        
                                                        @if($product->stock_quantity > 0)
                                                            <span class="text-green-600 text-sm block">En stock</span>
                                                        @else
                                                            <span class="text-red-600 text-sm block">Indisponible</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="space-y-3">
                                                    <a href="{{ route('products.show', $product->slug) }}" 
                                                    class="block w-full bg-gradient-to-r from-orange-500 to-red-600 text-white text-center py-3 px-4 rounded-lg font-medium hover:bg-gray-200 transition-all transform hover:scale-105">
                                                        Voir les détails
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <!-- Pagination for regular products -->
                                <div class="mt-8 flex justify-center">
                                    {{ $regularProducts->links() }}
                                </div>
                            </div>
                        @endif
                    @endif
                </main>
            </div>
        </div>
    </div>


    <!-- Marketing Banner Section -->
    <section class="py-16 bg-gradient-to-r from-orange-500 to-red-600 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-size: 60px 60px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <div class="inline-block mb-6">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-full text-sm font-black animate-pulse">
                        🔥 OFFRE LIMITÉE - JUSQU'AU 31 DÉCEMBRE
                    </span>
                </div>
                
                <h2 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">
                    Soldes Exceptionnelles
                    <span class="block text-3xl md:text-5xl mt-2 text-yellow-300">
                        Jusqu'à -60% sur toute la collection
                    </span>
                </h2>
                
                <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Profitez des meilleures réductions de l'année sur les plus grandes marques de chaussures. 
                    Stock limité, premier arrivé premier servi !
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
                    <a href="#products" class="inline-flex items-center justify-center bg-white text-gray-900 px-8 py-4 rounded-xl font-black hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Profiter des soldes
                    </a>
                    
                    <div class="flex items-center space-x-6 text-white/80">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-semibold">Livraison offerte</span>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-semibold">Satisfait ou remboursé</span>
                        </div>
                    </div>
                </div>
                
                <!-- Countdown Timer -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 max-w-md mx-auto">
                    <p class="text-white font-semibold mb-4">L'offre se termine dans :</p>
                    <div class="grid grid-cols-4 gap-2 text-center">
                        <div class="bg-white/20 rounded-lg p-3">
                            <div class="text-2xl font-black text-white" id="days">15</div>
                            <div class="text-xs text-white/80">Jours</div>
                        </div>
                        <div class="bg-white/20 rounded-lg p-3">
                            <div class="text-2xl font-black text-white" id="hours">08</div>
                            <div class="text-xs text-white/80">Heures</div>
                        </div>
                        <div class="bg-white/20 rounded-lg p-3">
                            <div class="text-2xl font-black text-white" id="minutes">42</div>
                            <div class="text-xs text-white/80">Minutes</div>
                        </div>
                        <div class="bg-white/20 rounded-lg p-3">
                            <div class="text-2xl font-black text-white" id="seconds">17</div>
                            <div class="text-xs text-white/80">Secondes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Product-Specific Testimonials Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block">
                    <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-6 leading-tight">
                        Témoignages Clients
                    </h2>
                    <div class="w-32 h-1.5 bg-gradient-to-r from-orange-500 to-red-600 mx-auto mb-8 rounded-full"></div>
                </div>
                <p class="text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed font-light">
                    Découvrez ce que nos clients pensent de nos produits phares
                </p>
            </div>
            
            <!-- Product Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 - Nike Air Max -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1557862921-37829c790f19?w=60&h=60&fit=crop&crop=center" alt="Client" class="w-16 h-16 rounded-full mr-4 border-4 border-orange-200">
                        <div>
                            <h4 class="font-black text-lg text-gray-900">Marie Dubois</h4>
                            <div class="flex items-center text-yellow-400 mb-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">Nike Air Max 270</p>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <p class="text-gray-700 leading-relaxed italic">
                            "Les Nike Air Max 270 sont incroyables ! Le confort est exceptionnel, parfait pour mes courses quotidiennes. 
                            J'ai particulièrement apprécié la rapidité de livraison et le service client impeccable."
                        </p>
                    </div>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Vérifié • Acheté il y a 2 semaines</span>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            <span>234</span>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 - Adidas Ultra Boost -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=center" alt="Client" class="w-16 h-16 rounded-full mr-4 border-4 border-blue-200">
                        <div>
                            <h4 class="font-black text-lg text-gray-900">Thomas Martin</h4>
                            <div class="flex items-center text-yellow-400 mb-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">Adidas Ultra Boost</p>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <p class="text-gray-700 leading-relaxed italic">
                            "Je cours marathons depuis 5 ans et les Ultra Boost sont de loin les meilleures chaussures que j'ai testées. 
                            L'amorti est parfait et elles sont incroyablement légères. Je recommande vivement !"
                        </p>
                    </div>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Vérifié • Acheté il y a 1 mois</span>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            <span>189</span>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 - Jordan 1 Retro -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60&h=60&fit=crop&crop=center" alt="Client" class="w-16 h-16 rounded-full mr-4 border-4 border-red-200">
                        <div>
                            <h4 class="font-black text-lg text-gray-900">Lucas Bernard</h4>
                            <div class="flex items-center text-yellow-400 mb-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">Jordan 1 Retro</p>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <p class="text-gray-700 leading-relaxed italic">
                            "Les Jordan 1 Retro sont un véritable classique ! Le design est intemporel et la qualité est au rendez-vous. 
                            Je les porte aussi bien pour le sport que pour sortir. Excellent rapport qualité/prix !"
                        </p>
                    </div>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Vérifié • Acheté il y a 3 semaines</span>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            <span>456</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Trust Indicators -->
            <div class="mt-16 text-center">
                <div class="inline-flex items-center space-x-8 bg-white rounded-2xl shadow-lg px-8 py-6">
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold text-gray-700">Témoignages vérifiés</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span class="font-semibold text-gray-700">Acheteurs confirmés</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="font-semibold text-gray-700">4.9/5 Note moyenne</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
<style>
/* Animation for sorting */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Sort indicator animation */
.sort-active {
    background: linear-gradient(135deg, #f97316 0%, #dc2626 100%) !important;
    color: white !important;
    transform: scale(1.05);
    transition: all 0.3s ease;
}

/* Product card hover during sort */
.product-card.sorting {
    transition: all 0.3s ease;
}

/* Enhanced filter badge animations */
.filter-badge {
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-10px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Loading state for filtering */
.filtering-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    backdrop-filter: blur(2px);
}

.filtering-spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f4f6;
    border-top: 4px solid #f97316;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Enhanced sort dropdown */
#sortSelect {
    transition: all 0.3s ease;
}

#sortSelect:focus {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(249, 115, 22, 0.15);
}

/* View toggle enhancements */
.view-toggle-btn {
    transition: all 0.2s ease;
}

.view-toggle-btn:hover {
    transform: scale(1.05);
}

.view-toggle-btn.active {
    background: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
</style>
@endpush

@push('scripts')
<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    initializeFilters();
});

function initializeFilters() {
    // Price range slider
    const priceRange = document.getElementById('priceRange');
    const currentMaxPrice = document.getElementById('currentMaxPrice');
    const maxPriceInput = document.getElementById('maxPrice');
    
    if (priceRange) {
        priceRange.addEventListener('input', function() {
            currentMaxPrice.textContent = this.value + '€';
            maxPriceInput.value = this.value;
        });
    }
    
    // Sort functionality
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            applyFilters();
        });
    }
    
    // View toggle
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    
    if (gridView && listView) {
        gridView.addEventListener('click', function() {
            setGridView();
        });
        
        listView.addEventListener('click', function() {
            setListView();
        });
    }
    
    // Search input
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', debounce(function() {
            applyFilters();
        }, 300));
    }
}

function applyFilters() {
    const filters = collectFilters();
    updateActiveFilters(filters);
    
    console.log('Applied filters:', filters);
    
    // Filter products in real-time
    filterProducts(filters);
    showFilteringState();
}

function filterProducts(filters) {
    const allProductCards = document.querySelectorAll('.product-card');
    let visibleCount = 0;
    
    allProductCards.forEach(card => {
        const shouldShow = shouldShowProduct(card, filters);
        
        if (shouldShow) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });
    
    // Apply sorting to visible products
    sortProducts(filters.sort);
    
    // Update results count
    updateResultsCount(visibleCount);
    
    // Show no results message if needed
    showNoResultsMessage(visibleCount === 0);
}

function sortProducts(sortBy) {
    // Get all product grids (both sale and regular products)
    const containers = document.querySelectorAll('.grid.grid-cols-1');
    
    containers.forEach(container => {
        const cards = Array.from(container.querySelectorAll('.product-card:not([style*="display: none"])'));
        
        cards.sort((a, b) => {
            switch(sortBy) {
                case 'price-asc':
                    return getPriceFromCard(a) - getPriceFromCard(b);
                case 'price-desc':
                    return getPriceFromCard(b) - getPriceFromCard(a);
                case 'name-asc':
                    return getNameFromCard(a).localeCompare(getNameFromCard(b));
                case 'name-desc':
                    return getNameFromCard(b).localeCompare(getNameFromCard(a));
                case 'newest':
                    return getNewestStatus(b) - getNewestStatus(a);
                case 'bestseller':
                    return getBestsellerStatus(b) - getBestsellerStatus(a);
                case 'rating':
                    return getRatingFromCard(b) - getRatingFromCard(a);
                case 'discount':
                    return getDiscountFromCard(b) - getDiscountFromCard(a);
                case 'relevance':
                default:
                    return getRelevanceScore(b) - getRelevanceScore(a);
            }
        });
        
        // Re-append sorted cards with animation
        cards.forEach((card, index) => {
            card.style.animation = 'none';
            setTimeout(() => {
                card.style.animation = `fadeIn 0.3s ease-in-out ${index * 0.05}s`;
            }, 10);
            container.appendChild(card);
        });
    });
    
    // Update sort indicator
    updateSortIndicator(sortBy);
}

function updateSortIndicator(sortBy) {
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        sortSelect.value = sortBy;
    }
}

function getRelevanceScore(card) {
    // Calculate relevance based on multiple factors
    let score = 0;
    
    // Discount products get higher relevance
    if (getDiscountFromCard(card) > 0) score += 10;
    
    // New products get higher relevance
    if (getNewestStatus(card) > 0) score += 8;
    
    // Bestsellers get higher relevance
    if (getBestsellerStatus(card) > 0) score += 6;
    
    // Higher rated products get higher relevance
    score += getRatingFromCard(card);
    
    // Lower price gets slight advantage
    const price = getPriceFromCard(card);
    if (price < 100) score += 2;
    else if (price < 150) score += 1;
    
    return score;
}

function getPriceFromCard(card) {
    const priceText = card.querySelector('.text-2xl')?.textContent || '';
    return parseFloat(priceText.replace('€', '').replace(',', '.').trim()) || 0;
}

function getNameFromCard(card) {
    return card.querySelector('h3')?.textContent || '';
}

function getNewestStatus(card) {
    // Check if product has "Nouveau" badge or similar
    const badges = card.querySelectorAll('span');
    for (let badge of badges) {
        if (badge.textContent.includes('Nouveau') || badge.textContent.includes('New')) {
            return 1;
        }
    }
    return 0;
}

function getDiscountFromCard(card) {
    // Look for discount percentage
    const badges = card.querySelectorAll('span');
    for (let badge of badges) {
        const discountMatch = badge.textContent.match(/-(\d+)%/);
        if (discountMatch) {
            return parseInt(discountMatch[1]);
        }
    }
    return 0;
}

function getBestsellerStatus(card) {
    // Check if product has "Bestseller" or "Top vente" badge
    const badges = card.querySelectorAll('span');
    for (let badge of badges) {
        if (badge.textContent.toLowerCase().includes('bestseller') || 
            badge.textContent.toLowerCase().includes('top vente') ||
            badge.textContent.toLowerCase().includes('plus vendu')) {
            return 1;
        }
    }
    
    // Also check for "Bestseller" in class names
    if (card.classList.contains('bestseller') || card.querySelector('.bestseller')) {
        return 1;
    }
    
    return 0;
}

function getRatingFromCard(card) {
    // Look for rating stars or rating text
    const ratingElements = card.querySelectorAll('[class*="rating"], [class*="star"], [class*="note"]');
    
    for (let element of ratingElements) {
        // Try to extract rating from text content
        const ratingMatch = element.textContent.match(/(\d+\.?\d*)\/5|(\d+\.?\d*)\s*stars?|note\s*(\d+\.?\d*)/i);
        if (ratingMatch) {
            return parseFloat(ratingMatch[1] || ratingMatch[2] || ratingMatch[3]) || 0;
        }
        
        // Count star elements
        const stars = element.querySelectorAll('svg[class*="text-yellow-400"], .star-filled');
        if (stars.length > 0) {
            return stars.length;
        }
    }
    
    // Look for rating in any text element
    const allText = card.textContent;
    const ratingMatch = allText.match(/(\d+\.?\d*)\/5|(\d+\.?\d*)\s*étoile(s?)/i);
    if (ratingMatch) {
        return parseFloat(ratingMatch[1] || ratingMatch[2]) || 0;
    }
    
    // Default rating for demo purposes (random between 3.5 and 5)
    return Math.random() * 1.5 + 3.5;
}

function shouldShowProduct(card, filters) {
    // Get product data from card
    const productName = card.querySelector('h3')?.textContent.toLowerCase() || '';
    const productBrand = card.querySelector('.text-purple-600')?.textContent.toLowerCase() || '';
    const productColor = card.querySelector('.text-gray-600')?.textContent.toLowerCase() || '';
    const productPriceText = card.querySelector('.text-2xl')?.textContent || '';
    const productPrice = parseFloat(productPriceText.replace('€', '').replace(',', '.').trim()) || 0;
    
    // Search filter
    if (filters.search && !productName.includes(filters.search.toLowerCase()) && 
        !productBrand.includes(filters.search.toLowerCase())) {
        return false;
    }
    
    // Price filters
    if (filters.minPrice && productPrice < parseFloat(filters.minPrice)) {
        return false;
    }
    if (filters.maxPrice && productPrice > parseFloat(filters.maxPrice)) {
        return false;
    }
    
    // Size filter
    if (filters.sizes.length > 0) {
        const productSize = extractSizeFromCard(card);
        if (!filters.sizes.includes(productSize)) {
            return false;
        }
    }
    
    // Color filter
    if (filters.colors.length > 0) {
        const hasMatchingColor = filters.colors.some(color => 
            productColor.includes(color.toLowerCase())
        );
        if (!hasMatchingColor) {
            return false;
        }
    }
    
    // Brand filter
    if (filters.brands.length > 0 && !filters.brands.some(brand => 
        productBrand.includes(brand.toLowerCase()))) {
        return false;
    }
    
    return true;
}

function extractSizeFromCard(card) {
    const sizeText = card.querySelector('.text-gray-600')?.textContent || '';
    const sizeMatch = sizeText.match(/Taille (\d+)/);
    return sizeMatch ? sizeMatch[1] : '';
}

function updateResultsCount(count) {
    const resultsTitle = document.querySelector('h2');
    if (resultsTitle) {
        const originalTitle = resultsTitle.textContent.split('(')[0];
        resultsTitle.innerHTML = `${originalTitle}<span class="text-lg font-medium text-gray-600">(${count} résultats)</span>`;
    }
}

function showNoResultsMessage(show) {
    let noResultsMsg = document.getElementById('noResultsMessage');
    
    if (show && !noResultsMsg) {
        noResultsMsg = document.createElement('div');
        noResultsMsg.id = 'noResultsMessage';
        noResultsMsg.className = 'text-center py-12 bg-white rounded-xl shadow-lg';
        noResultsMsg.innerHTML = `
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.562M15 6.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucun produit trouvé</h3>
            <p class="text-gray-600">Essayez d'ajuster vos filtres pour voir plus de résultats</p>
            <button onclick="resetFilters()" class="mt-4 text-orange-600 hover:text-orange-700 font-medium">
                Réinitialiser les filtres
            </button>
        `;
        
        // Insert after the results header
        const resultsHeader = document.querySelector('.bg-white.rounded-xl.p-6.shadow-lg');
        if (resultsHeader) {
            resultsHeader.parentNode.insertBefore(noResultsMsg, resultsHeader.nextSibling);
        }
    } else if (!show && noResultsMsg) {
        noResultsMsg.remove();
    }
}

function collectFilters() {
    const filters = {
        search: document.getElementById('searchInput')?.value || '',
        minPrice: document.getElementById('minPrice')?.value || '',
        maxPrice: document.getElementById('maxPrice')?.value || '',
        sizes: getCheckedValues('.size-filter'),
        colors: getCheckedValues('.color-filter'),
        brands: getCheckedValues('.brand-filter'),
        categories: getCheckedValues('.category-filter'),
        sort: document.getElementById('sortSelect')?.value || 'relevance'
    };
    
    return filters;
}

function getCheckedValues(selector) {
    const checkboxes = document.querySelectorAll(selector + ':checked');
    return Array.from(checkboxes).map(cb => cb.value);
}

function updateActiveFilters(filters) {
    const activeFiltersContainer = document.getElementById('activeFilters');
    if (!activeFiltersContainer) return;
    
    activeFiltersContainer.innerHTML = '';
    
    // Add active filter badges
    Object.entries(filters).forEach(([key, value]) => {
        if (value && value !== '' && (Array.isArray(value) ? value.length > 0 : true)) {
            const badge = createFilterBadge(key, value);
            activeFiltersContainer.appendChild(badge);
        }
    });
}

function createFilterBadge(key, value) {
    const badge = document.createElement('span');
    badge.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800';
    
    let displayText = '';
    switch(key) {
        case 'search': displayText = `Recherche: ${value}`; break;
        case 'minPrice': displayText = `Min: ${value}€`; break;
        case 'maxPrice': displayText = `Max: ${value}€`; break;
        case 'sizes': displayText = `Tailles: ${value.join(', ')}`; break;
        case 'colors': displayText = `Couleurs: ${value.join(', ')}`; break;
        case 'brands': displayText = `Marques: ${value.join(', ')}`; break;
        case 'categories': displayText = `Catégories: ${value.join(', ')}`; break;
        default: displayText = value;
    }
    
    badge.textContent = displayText;
    
    const removeBtn = document.createElement('button');
    removeBtn.className = 'ml-2 text-orange-600 hover:text-orange-800';
    removeBtn.innerHTML = '×';
    removeBtn.onclick = function() {
        removeFilter(key);
    };
    
    badge.appendChild(removeBtn);
    return badge;
}

function removeFilter(filterKey) {
    switch(filterKey) {
        case 'search':
            document.getElementById('searchInput').value = '';
            break;
        case 'minPrice':
            document.getElementById('minPrice').value = '';
            break;
        case 'maxPrice':
            document.getElementById('maxPrice').value = '';
            document.getElementById('priceRange').value = '500';
            document.getElementById('currentMaxPrice').textContent = '500€';
            break;
        default:
            document.querySelectorAll(`.${filterKey}-filter:checked`).forEach(cb => cb.checked = false);
    }
    applyFilters();
}

function resetFilters() {
    // Reset all filter inputs
    document.getElementById('searchInput').value = '';
    document.getElementById('minPrice').value = '';
    document.getElementById('maxPrice').value = '';
    document.getElementById('priceRange').value = '500';
    document.getElementById('currentMaxPrice').textContent = '500€';
    document.getElementById('sortSelect').value = 'relevance';
    
    // Reset all checkboxes
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
    
    // Show all products
    const allProductCards = document.querySelectorAll('.product-card');
    const totalProducts = allProductCards.length;
    
    allProductCards.forEach(card => {
        card.style.display = 'block';
    });
    
    // Update results count
    updateResultsCount(totalProducts);
    
    // Remove no results message
    showNoResultsMessage(false);
    
    // Clear active filters
    const activeFiltersContainer = document.getElementById('activeFilters');
    if (activeFiltersContainer) {
        activeFiltersContainer.innerHTML = '';
    }
}

function setGridView() {
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    
    gridView.classList.add('bg-white', 'shadow-sm');
    gridView.classList.remove('bg-transparent');
    
    listView.classList.remove('bg-white', 'shadow-sm');
    listView.classList.add('bg-transparent');
    
    // Update product grid layout
    document.querySelectorAll('.product-card').forEach(card => {
        card.parentElement.classList.remove('flex', 'flex-col');
        card.parentElement.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3', 'gap-8');
    });
}

function setListView() {
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    
    listView.classList.add('bg-white', 'shadow-sm');
    listView.classList.remove('bg-transparent');
    
    gridView.classList.remove('bg-white', 'shadow-sm');
    gridView.classList.add('bg-transparent');
    
    // Update product grid layout to list view
    document.querySelectorAll('.product-card').forEach(card => {
        card.parentElement.classList.remove('grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3', 'gap-8');
        card.parentElement.classList.add('flex', 'flex-col', 'space-y-4');
    });
}

function showFilteringState() {
    // Show professional loading overlay
    showLoadingOverlay();
    
    // Add sorting class to cards
    document.querySelectorAll('.product-card').forEach(card => {
        card.classList.add('sorting');
        card.style.opacity = '0.7';
    });
    
    // Simulate filtering delay
    setTimeout(() => {
        hideLoadingOverlay();
        document.querySelectorAll('.product-card').forEach(card => {
            card.classList.remove('sorting');
            card.style.opacity = '1';
        });
    }, 600);
}

function showLoadingOverlay() {
    let overlay = document.getElementById('filteringOverlay');
    
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.id = 'filteringOverlay';
        overlay.className = 'filtering-overlay';
        overlay.innerHTML = `
            <div class="text-center">
                <div class="filtering-spinner mx-auto mb-4"></div>
                <p class="text-gray-600 font-medium">Application des filtres...</p>
            </div>
        `;
        document.body.appendChild(overlay);
    }
    
    overlay.style.display = 'flex';
}

function hideLoadingOverlay() {
    const overlay = document.getElementById('filteringOverlay');
    if (overlay) {
        overlay.style.display = 'none';
    }
}

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
</script>
@endpush
