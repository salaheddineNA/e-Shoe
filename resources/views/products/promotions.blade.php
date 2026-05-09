@extends('layouts.shop')

@section('title', 'ShoeStore - Promotions & Offres Spéciales')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-red-600 via-pink-600 to-purple-600 overflow-hidden mb-16">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://p0.piqsels.com/preview/206/873/135/gray-and-black-nike-air-jordan-1-s.jpg" 
             alt="Promotions exclusives" 
             class="w-full h-full object-cover">
        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
        <!-- Additional overlay for better text visibility -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
    </div>
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative px-8 py-16 md:px-12 lg:px-20">
        <div class="max-w-4xl mx-auto text-center text-white">
            <div class="flex items-center justify-center mb-4">
                <svg class="w-12 h-12 text-white animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-600 bg-gradient-to-r from-orange-500 to-red-600">
                    Promotions Exclusives
                </span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-white/90">
                Découvrez nos meilleures offres et réductions exceptionnelles
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#products" class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                    Voir les promotions
                </a>
                <a href="{{ route('products.index') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-red-600 transition-colors">
                    Tous les produits
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12 w-3/5 mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
        <div class="text-6xl font-bold text-red-600 mb-2">{{ $stats['sale_products'] }}</div>
        <div class="text-red-600 text-xl">Produits en promotion</div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
        <div class="text-6xl font-bold text-green-600 mb-2">{{ number_format($stats['avg_discount'], 1) }}%</div>
        <div class="text-green-600 text-xl">Remise moyenne</div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
        <div class="text-6xl font-bold text-purple-600 mb-2">{{ number_format($stats['max_discount'], 1) }}%</div>
        <div class="text-purple-600 text-xl">Meilleure remise</div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
        <div class="text-6xl font-bold text-indigo-600 mb-2">{{ $stats['total_products'] }}</div>
        <div class="text-indigo-600 text-xl">Total produits</div>
    </div>
</div>

<!-- Compact Filters Section -->
<div class="bg-white rounded-xl shadow-lg p-4 mb-8 w-4/5 mx-auto border border-gray-200">
    <form method="GET" action="{{ route('products.promotions') }}" class="space-y-4">
        <!-- Quick Filters Bar -->
        <div class="flex flex-wrap items-center gap-3">
            <!-- Search -->
            <div class="flex-1 min-w-[200px]">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                           placeholder="Rechercher...">
                    <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Brand -->
            <select name="brand" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option value="">Marque</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                @endforeach
            </select>
            
            <!-- Color -->
            <select name="color" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option value="">Couleur</option>
                @foreach($colors as $color)
                    @php
                        $colorOptions = array_map('trim', explode(',', $color));
                        foreach($colorOptions as $colorOption) {
                    @endphp
                        <option value="{{ $colorOption }}" {{ request('color') == $colorOption ? 'selected' : '' }}>{{ $colorOption }}</option>
                    @php
                        }
                    @endphp
                @endforeach
            </select>
            
            <!-- Size -->
            <select name="size" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option value="">Pointure</option>
                @foreach($sizes as $size)
                    @php
                        $sizeOptions = array_map('trim', explode(',', $size));
                        foreach($sizeOptions as $sizeOption) {
                    @endphp
                        <option value="{{ $sizeOption }}" {{ request('size') == $sizeOption ? 'selected' : '' }}>{{ $sizeOption }}</option>
                    @php
                        }
                    @endphp
                @endforeach
            </select>
            
            <!-- Sort -->
            <select name="sort" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option value="">Trier</option>
                <option value="discount" {{ request('sort') == 'discount' ? 'selected' : '' }}>Meilleure remise</option>
                <option value="sale_price" {{ request('sort') == 'sale_price' ? 'selected' : '' }}>Prix promo</option>
                <option value="original_price" {{ request('sort') == 'original_price' ? 'selected' : '' }}>Prix original</option>
                <option value="stock" {{ request('sort') == 'stock' ? 'selected' : '' }}>Stock</option>
                <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Nouveauté</option>
            </select>
            
            <!-- Price Range Toggle -->
            <button type="button" onclick="togglePriceRange()" class="px-3 py-2 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg text-sm font-medium hover:bg-orange-200 transition-colors">
                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.615C6.602 6.234 6 7.048 6 8c0 1.087.78 1.798 1.553 2.216.775.418 1.647.675 2.197.856.626.205 1.033.383 1.29.57.245.178.36.38.36.658 0 .308-.157.556-.476.752-.322.197-.78.32-1.307.32-.9 0-1.745-.37-2.365-.978a1 1 0 10-1.4 1.428A5.21 5.21 0 009 15.909V16a1 1 0 102 0v-.09c.603-.083 1.166-.29 1.645-.582C13.398 14.766 14 13.952 14 13c0-1.087-.78-1.798-1.553-2.216-.775-.418-1.647-.675-2.197-.856-.626-.205-1.033-.383-1.29-.57C8.715 9.18 8.6 8.978 8.6 8.7c0-.308.157-.556.476-.752.322-.197.78-.32 1.307-.32.9 0 1.745.37 2.365.978a1 1 0 001.4-1.428A5.21 5.21 0 0011 5.091V5z" clip-rule="evenodd"/>
                </svg>
                Prix
            </button>
        </div>
        
        <!-- Price Range (Hidden by default) -->
        <div id="priceRange" class="hidden bg-gray-50 rounded-lg p-3">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Min (€)</label>
                    <input type="number" name="min_price" value="{{ request('min_price') }}" step="0.01" min="0"
                           class="w-full px-2 py-1.5 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                           placeholder="0">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Max (€)</label>
                    <input type="number" name="max_price" value="{{ request('max_price') }}" step="0.01" min="0"
                           class="w-full px-2 py-1.5 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                           placeholder="999">
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-3 border-t border-gray-200">
            <div class="flex gap-2">
                <button type="submit" class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-orange-600 transition-colors">
                    
                    Filtrer
                </button>
                <a href="{{ route('products.promotions') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                    Réinitialiser
                </a>
            </div>
            
            <!-- Active Filters Count -->
            @if(request()->hasAny(['search', 'brand', 'color', 'size', 'sort', 'min_price', 'max_price']))
                <div class="text-xs text-gray-500">
                    <span class="bg-orange-100 text-orange-700 px-2 py-1 rounded-full font-medium">
                        {{ collect(['search', 'brand', 'color', 'size', 'sort', 'min_price', 'max_price'])->filter(fn($field) => request()->has($field))->count() }} filtres actifs
                    </span>
                </div>
            @endif
        </div>
    </form>
</div>

<script>
function togglePriceRange() {
    const priceRange = document.getElementById('priceRange');
    priceRange.classList.toggle('hidden');
}
</script>

<!-- Products Section -->
<div id="products" class="mb-16 w-4/5 mx-auto">

    @if($products->isEmpty())
        <div class="text-center py-12 bg-white rounded-xl shadow-lg">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucune promotion disponible</h3>
            <p class="text-gray-600">Revenez bientôt pour découvrir nos nouvelles offres!</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $index => $product)
                <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden fade-in border-2 border-red-200" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="relative group">
                        <img src="{{ $product->getMainImage() }}" alt="{{ $product->name }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        
                        <!-- Badges -->
                        <div class="absolute top-4 left-4 space-y-2">
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold animate-pulse">
                                -{{ $product->getDiscountPercentage() }}%
                            </span>
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
                                <div class="flex items-center space-x-2">
                                    <span class="text-2xl font-bold text-green-600">{{ $product->getFormattedCurrentPrice() }}</span>
                                    <span class="text-lg text-gray-400 line-through">{{ $product->getFormattedOriginalPrice() }}</span>
                                </div>
                                @if($product->sale_description)
                                    <p class="text-xs text-red-600 font-semibold mt-1">{{ $product->sale_description }}</p>
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
                            
                            @if($product->stock_quantity > 0)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                </form>
                            @else
                                <button disabled 
                                        class="w-full bg-gray-200 text-gray-500 py-3 px-4 rounded-lg font-medium cursor-not-allowed">
                                    Indisponible
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    @endif
</div>

@endsection
