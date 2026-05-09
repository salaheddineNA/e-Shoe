@extends('layouts.shop')

@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-8 text-sm pt-8">
        <div class="flex items-center space-x-2 text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-purple-600 transition-colors">Accueil</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="{{ route('products.index') }}" class="hover:text-purple-600 transition-colors">Produits</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-900 font-medium">{{ $product->name }}</span>
        </div>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Product Images -->
        <div class="space-y-4">
            <!-- Main Image Display -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <img id="mainImage" src="{{ $product->getMainImage() }}" alt="{{ $product->name }}" class="w-full h-96 object-cover">
            </div>
            
            <!-- Thumbnail Gallery -->
            <div class="grid grid-cols-4 gap-2">
                @php
                    $allImages = $product->getAllImages();
                    $mainImage = $product->getMainImage();
                @endphp
                
                @foreach($allImages as $index => $image)
                    <div class="bg-white rounded-lg p-2 {{ $index === 0 ? 'border-2 border-purple-600' : 'border border-gray-200 hover:border-purple-600' }} transition-colors cursor-pointer"
                     onclick="changeMainImage('{{ $image }}', {{ $index }})"
                     id="thumbnail-{{ $index }}">
                        <img src="{{ $image }}" alt="{{ $product->name }} - Image {{ $index + 1 }}" class="w-full h-20 object-cover rounded">
                    </div>
                @endforeach
                
                @if(count($allImages) < 4)
                    @for($i = count($allImages); $i < 4; $i++)
                        <div class="bg-gray-100 rounded-lg p-2 border border-gray-200 flex items-center justify-center">
                            <div class="text-gray-400 text-xs text-center">
                                <svg class="w-8 h-8 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Image {{ $i + 1 }}
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>

        <!-- Product Details -->
        <div class="space-y-6">
            <!-- Product Info -->
            <div>
                <div class="mb-4">
                    <span class="inline-block bg-gradient-to-r from-orange-500 to-red-600 text-white text-sm font-semibold px-3 py-1 rounded-full">
                        {{ $product->brand }}
                    </span>
                </div>
                
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                
                <div class="flex items-center space-x-6 mb-6">
                    <div class="flex items-center space-x-1">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <span class="text-gray-600 ml-2">(4.0) • 24 avis</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-6 text-sm text-gray-600 mb-6">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        @php
                            $colors = array_map('trim', explode(',', $product->color));
                            echo count($colors) > 1 ? count($colors) . ' couleurs disponibles' : trim($product->color);
                        @endphp
                    </span>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        @php
                            $sizes = array_map('trim', explode(',', $product->size));
                            echo count($sizes) > 1 ? count($sizes) . ' pointures disponibles' : 'Taille ' . trim($product->size);
                        @endphp
                    </span>
                </div>
                
                <div class="flex items-center justify-between mb-8">
                    <div>
                        @if($product->isCurrentlyOnSale())
                            <div class="flex items-center space-x-3">
                                <span class="text-4xl font-bold text-green-600">{{ $product->getFormattedCurrentPrice() }}</span>
                                <span class="text-2xl text-gray-400 line-through">{{ $product->getFormattedOriginalPrice() }}</span>
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold animate-pulse">
                                    -{{ $product->getDiscountPercentage() }}%
                                </span>
                            </div>
                            @if($product->sale_description)
                                <p class="text-red-600 font-semibold mt-2">{{ $product->sale_description }}</p>
                            @endif
                        @else
                            <span class="text-4xl font-bold text-gray-900">{{ $product->getFormattedCurrentPrice() }}</span>
                        @endif
                    </div>
                    @if($product->stock_quantity > 0)
                        <div class="text-right">
                            <span class="text-green-600 font-semibold">{{ $product->stock_quantity }} en stock</span>
                            <p class="text-sm text-gray-600">Livraison 3-5 jours</p>
                        </div>
                    @else
                        <span class="text-red-600 font-semibold">Rupture de stock</span>
                    @endif
                </div>
            </div>

            <!-- Description -->
            <div class="bg-gray-50 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Description</h3>
                <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
            </div>

            <!-- Available Colors -->
            @if($product->color)
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                    Couleurs disponibles
                </h3>
                <div class="flex flex-wrap gap-3">
                    @php
                        $colors = array_map('trim', explode(',', $product->color));
                        $colorMap = [
                            'Noir' => 'bg-black',
                            'Blanc' => 'bg-white border-gray-300',
                            'Rouge' => 'bg-red-500',
                            'Bleu' => 'bg-blue-500',
                            'Vert' => 'bg-green-500',
                            'Jaune' => 'bg-yellow-400',
                            'Violet' => 'bg-purple-500',
                            'Orange' => 'bg-orange-500',
                            'Rose' => 'bg-pink-400',
                            'Gris' => 'bg-gray-500',
                            'Marron' => 'bg-amber-700',
                            'Marine' => 'bg-blue-900',
                            'Personnalisé' => 'bg-gradient-to-br from-indigo-400 to-purple-400'
                        ];
                    @endphp
                    
                    @foreach($colors as $color)
                        <div class="flex items-center space-x-2 bg-gray-50 rounded-lg px-3 py-2">
                            <div class="w-6 h-6 rounded-full {{ $colorMap[trim($color)] ?? 'bg-gray-400' }} {{ trim($color) === 'Blanc' ? 'border border-gray-300' : '' }}"></div>
                            <span class="text-sm font-medium text-gray-700">{{ trim($color) }}</span>
                        </div>
                    @endforeach
                </div>
                @if(count($colors) > 1)
                    <p class="text-xs text-gray-500 mt-3">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Plusieurs couleurs disponibles pour ce modèle
                    </p>
                @endif
            </div>
            @endif

            <!-- Available Sizes -->
            @if($product->size)
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    Pointures disponibles
                </h3>
                <div class="grid grid-cols-4 md:grid-cols-6 gap-2 mb-3">
                    @php
                        $sizes = array_map('trim', explode(',', $product->size));
                    @endphp
                    
                    @foreach($sizes as $size)
                        <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-3 text-center">
                            <span class="text-sm font-semibold text-indigo-700">{{ trim($size) }}</span>
                        </div>
                    @endforeach
                </div>
                @if(count($sizes) > 1)
                    <p class="text-xs text-gray-500">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ count($sizes) }} pointures disponibles pour ce modèle
                    </p>
                @endif
            </div>
            @endif

            <!-- Color Selection -->
            @if($product->color)
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Couleur disponible</label>
                <div class="flex flex-wrap gap-3 mb-2">
                    @php
                        $availableColors = array_map('trim', explode(',', $product->color));
                        $colorMap = [
                            'Noir' => 'bg-black',
                            'Blanc' => 'bg-white border-gray-300',
                            'Rouge' => 'bg-red-500',
                            'Bleu' => 'bg-blue-500',
                            'Vert' => 'bg-green-500',
                            'Jaune' => 'bg-yellow-400',
                            'Violet' => 'bg-purple-500',
                            'Orange' => 'bg-orange-500',
                            'Rose' => 'bg-pink-400',
                            'Gris' => 'bg-gray-500',
                            'Marron' => 'bg-amber-700',
                            'Marine' => 'bg-blue-900',
                            'Personnalisé' => 'bg-gradient-to-br from-indigo-400 to-purple-400'
                        ];
                    @endphp
                    
                    @foreach($availableColors as $color)
                        <button type="button" 
                                class="relative p-3 rounded-lg border-2 border-gray-300 hover:border-purple-600 transition-all"
                                onclick="selectColor(this, '{{ trim($color) }}')">
                            <div class="w-8 h-8 rounded-full {{ $colorMap[trim($color)] ?? 'bg-gray-400' }} {{ trim($color) === 'Blanc' ? 'border border-gray-300' : '' }}"></div>
                            <span class="text-xs mt-1 block">{{ trim($color) }}</span>
                            <div class="absolute top-1 right-1 opacity-0 checkmark transition-opacity">
                                <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                    @endforeach
                </div>
                <p class="text-xs text-gray-500">Couleur sélectionnée automatiquement</p>
            </div>
            @endif

            <!-- Size Selection -->
            @if($product->size)
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Pointure disponible</label>
                <div class="flex flex-wrap gap-2">
                    @php
                        $availableSizes = array_map('trim', explode(',', $product->size));
                    @endphp
                    @foreach($availableSizes as $size)
                        <button type="button" 
                                class="w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-purple-600 transition-colors font-medium text-sm"
                                onclick="selectSize(this, '{{ trim($size) }}')">
                            {{ trim($size) }}
                        </button>
                    @endforeach
                </div>
                <p class="text-xs text-gray-500 mt-2">Pointure sélectionnée automatiquement</p>
            </div>
            @endif

            <!-- Add to Cart -->
            @if($product->stock_quantity > 0)
                <div class="space-y-4">
                    <!-- Selection Summary -->
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Votre sélection:</h4>
                        <div class="space-y-1">
                            @if($product->color)
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm text-gray-600">Couleur:</span>
                                    <div class="flex items-center space-x-1">
                                        <div class="w-4 h-4 rounded-full 
                                            @if($product->color == 'Noir') bg-black
                                            @elseif($product->color == 'Blanc') bg-white border border-gray-300
                                            @elseif($product->color == 'Rouge') bg-red-500
                                            @elseif($product->color == 'Bleu') bg-blue-500
                                            @elseif($product->color == 'Vert') bg-green-500
                                            @elseif($product->color == 'Jaune') bg-yellow-400
                                            @elseif($product->color == 'Violet') bg-purple-500
                                            @elseif($product->color == 'Orange') bg-orange-500
                                            @elseif($product->color == 'Rose') bg-pink-400
                                            @elseif($product->color == 'Gris') bg-gray-500
                                            @elseif($product->color == 'Marron') bg-amber-700
                                            @elseif($product->color == 'Marine') bg-blue-900
                                            @else bg-gray-400
                                            @endif
                                            {{ trim(explode(',', $product->color)[0]) === 'Blanc' ? 'border border-gray-300' : '' }}"></div>
                                        <span class="text-sm font-medium" id="selected_color_display">{{ trim(explode(',', $product->color)[0]) }}</span>
                                    </div>
                                </div>
                            @endif
                            @if($product->size)
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm text-gray-600">Pointure:</span>
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-medium" id="selected_size_display">{{ trim(explode(',', $product->size)[0]) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="space-y-4" onsubmit="return validateSelection()">
                        @csrf
                        
                        <!-- Hidden fields for color and size -->
                        <input type="hidden" id="selected_color" name="color" value="{{ $product->color ? trim(explode(',', $product->color)[0]) : '' }}">
                        <input type="hidden" id="selected_size" name="size" value="{{ $product->size ? trim(explode(',', $product->size)[0]) : '' }}">
                        
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                Quantité
                            </label>
                            <div class="flex items-center space-x-4">
                                <button type="button" class="w-10 h-10 rounded-lg border border-gray-300 hover:border-purple-600 transition-colors" onclick="decreaseQuantity()">
                                    <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock_quantity }}" 
                                       class="w-20 text-center border border-gray-300 rounded-lg py-2">
                                <button type="button" class="w-10 h-10 rounded-lg border border-gray-300 hover:border-purple-600 transition-colors" onclick="increaseQuantity()">
                                    <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="text-sm text-gray-600">
                            <p>💡 Vous pouvez ajouter le même produit plusieurs fois avec des couleurs ou pointures différentes.</p>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-orange-500 to-red-600 text-white py-4 px-6 rounded-xl font-semibold text-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105 flex items-center justify-center space-x-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Ajouter au panier</span>
                        </button>
                    </form>
                </div>
            @else
                <div class="bg-gray-100 border border-gray-300 rounded-xl p-6 text-center">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p class="text-gray-600 font-semibold mb-2">Ce produit est actuellement en rupture de stock</p>
                    <p class="text-gray-500 text-sm">Revenez bientôt pour vérifier la disponibilité</p>
                </div>
            @endif

            <!-- Shipping Info -->
            <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl p-6 border border-purple-200">
                <h4 class="font-semibold text-purple-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Livraison & Retours
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-900">Livraison gratuite</p>
                            <p class="text-gray-600">À partir de 100€ d'achat</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-900">Retour gratuit</p>
                            <p class="text-gray-600">30 jours de retour</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-900">Paiement sécurisé</p>
                            <p class="text-gray-600">Paiement à la livraison</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-900">Support client</p>
                            <p class="text-gray-600">7j/7 disponible</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Tabs -->
    <div class="mt-16">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8">
                <button class="border-b-2 border-purple-600 py-2 px-1 text-sm font-medium text-purple-600">
                    Description
                </button>
                <button class="border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    Avis (24)
                </button>
                <button class="border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    Guide des tailles
                </button>
            </nav>
        </div>
        
        <div class="mt-8">
            <div class="prose max-w-none">
                <h3>Caractéristiques principales</h3>
                <ul>
                    <li>Matière de haute qualité</li>
                    <li>Confort optimal pour toute la journée</li>
                    <li>Design moderne et élégant</li>
                    <li>Résistant et durable</li>
                    <li>Idéal pour le sport et le quotidien</li>
                </ul>
                
                <h3>Entretien</h3>
                <p>Pour préserver la qualité de vos chaussures, nettoyez-les régulièrement avec un chiffon doux et humide. Évitez l'exposition prolongée au soleil et à l'humidité.</p>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="mt-16">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Vous pourriez aussi aimer</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Placeholder for related products -->
            <div class="text-center text-gray-500 col-span-4 py-8">
                Plus de produits similaires bientôt disponibles...
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="mt-16">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Avis des clients</h2>
        
        <!-- Rating Summary -->
        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl p-6 mb-8 border border-yellow-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-yellow-600">{{ number_format($product->average_rating, 1) }}</div>
                        <div class="flex items-center mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-6 h-6 {{ $i <= round($product->average_rating) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                        <div class="text-sm text-gray-600 mt-1">{{ $product->review_count }} avis</div>
                    </div>
                </div>
                
                <div class="flex-1 ml-8">
                    @for($rating = 5; $rating >= 1; $rating--)
                        @php
                            $ratingCount = $product->approvedReviews()->where('rating', $rating)->count();
                            $ratingPercentage = $product->review_count > 0 ? ($ratingCount / $product->review_count) * 100 : 0;
                        @endphp
                        <div class="flex items-center space-x-3 mb-1">
                            <span class="text-sm text-gray-600 w-8">{{ $rating }} ★</span>
                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $ratingPercentage }}%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8 text-right">{{ $ratingCount }}</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Review Form -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Donnez votre avis</h3>
            <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                        <input type="text" name="customer_name" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" name="customer_email" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Note *</label>
                    <div class="flex space-x-2">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" 
                                    class="rating-star w-10 h-10 text-2xl text-gray-300 hover:text-yellow-400 focus:outline-none"
                                    data-rating="{{ $i }}"
                                    onclick="setRating({{ $i }})">
                                ★
                            </button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating" value="5" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Commentaire *</label>
                    <textarea name="comment" rows="4" required 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                              placeholder="Partagez votre expérience avec ce produit..."></textarea>
                </div>
                
                <button type="submit" 
                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                    Envoyer mon avis
                </button>
            </form>
        </div>

        <!-- Existing Reviews -->
        @if($product->approvedReviews->count() > 0)
            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-gray-900">Avis des clients</h3>
                @foreach($product->approvedReviews as $review)
                    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <span class="text-indigo-600 font-bold">{{ strtoupper(substr($review->customer_name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $review->customer_name }}</h4>
                                        <div class="flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endfor
                                            <span class="ml-2 text-sm text-gray-600">{{ $review->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed">{{ $review->comment }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-gray-50 rounded-xl">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Soyez le premier à donner votre avis</h3>
                <p class="text-gray-600">Partagez votre expérience avec ce produit.</p>
            </div>
        @endif
    </div>
</div>
@endsection

<script>
function selectColor(button, color) {
    // Remove previous selection from all color buttons
    var colorButtons = document.querySelectorAll('button[onclick*="selectColor"]');
    colorButtons.forEach(function(btn) {
        btn.classList.remove('border-purple-600', 'bg-purple-50');
        btn.classList.add('border-gray-300');
        var checkmark = btn.querySelector('.checkmark');
        if (checkmark) {
            checkmark.style.opacity = '0';
        }
    });
    
    // Add selection to clicked button
    button.classList.remove('border-gray-300');
    button.classList.add('border-purple-600', 'bg-purple-50');
    var checkmark = button.querySelector('.checkmark');
    if (checkmark) {
        checkmark.style.opacity = '1';
    }
    
    // Update hidden input
    document.getElementById('selected_color').value = color;
    
    // Update display
    var colorDisplay = document.getElementById('selected_color_display');
    if (colorDisplay) {
        colorDisplay.textContent = color;
        // Update color indicator
        var colorIndicator = colorDisplay.previousElementSibling;
        if (colorIndicator) {
            colorIndicator.className = 'w-4 h-4 rounded-full ' + getColorClass(color);
            if (color === 'Blanc') {
                colorIndicator.classList.add('border', 'border-gray-300');
            }
        }
    }
}

function selectSize(button, size) {
    // Remove previous selection from all size buttons
    var sizeButtons = document.querySelectorAll('button.w-12.h-12');
    sizeButtons.forEach(function(btn) {
        btn.classList.remove('border-purple-600', 'bg-purple-50');
        btn.classList.add('border-gray-300');
    });
    
    // Add selection to clicked button
    button.classList.remove('border-gray-300');
    button.classList.add('border-purple-600', 'bg-purple-50');
    
    // Update hidden input
    document.getElementById('selected_size').value = size;
    
    // Update display
    var sizeDisplay = document.getElementById('selected_size_display');
    if (sizeDisplay) {
        sizeDisplay.textContent = size;
    }
}

function getColorClass(color) {
    var colorMap = {
        'Noir': 'bg-black',
        'Blanc': 'bg-white',
        'Rouge': 'bg-red-500',
        'Bleu': 'bg-blue-500',
        'Vert': 'bg-green-500',
        'Jaune': 'bg-yellow-400',
        'Violet': 'bg-purple-500',
        'Orange': 'bg-orange-500',
        'Rose': 'bg-pink-400',
        'Gris': 'bg-gray-500',
        'Marron': 'bg-amber-700',
        'Marine': 'bg-blue-900'
    };
    return colorMap[color] || 'bg-gray-400';
}

function decreaseQuantity() {
    var input = document.getElementById('quantity');
    var currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
}

function increaseQuantity() {
    var input = document.getElementById('quantity');
    var currentValue = parseInt(input.value);
    var maxValue = parseInt(input.max);
    if (currentValue < maxValue) {
        input.value = currentValue + 1;
    }
}

function validateSelection() {
    var selectedColor = document.getElementById('selected_color');
    var selectedSize = document.getElementById('selected_size');
    
    // For debugging
    if (selectedColor) {
        console.log('Color:', selectedColor.value);
    }
    if (selectedSize) {
        console.log('Size:', selectedSize.value);
    }
    
    // Check if color exists but is not selected (empty string means not available)
    if (selectedColor && selectedColor.value && selectedColor.value.trim() === '') {
        alert('Veuillez sélectionner une couleur.');
        return false;
    }
    
    // Check if size exists but is not selected (empty string means not available)
    if (selectedSize && selectedSize.value && selectedSize.value.trim() === '') {
        alert('Veuillez sélectionner une pointure.');
        return false;
    }
    
    return true;
}

function setRating(rating) {
    // Update hidden input
    document.getElementById('rating').value = rating;
    
    // Update star display
    var stars = document.querySelectorAll('.rating-star');
    stars.forEach(function(star, index) {
        if (index < rating) {
            star.classList.remove('text-gray-300');
            star.classList.add('text-yellow-400');
        } else {
            star.classList.remove('text-yellow-400');
            star.classList.add('text-gray-300');
        }
    });
}

// Change main image when thumbnail is clicked
function changeMainImage(imageSrc, thumbnailIndex) {
    // Update main image
    const mainImage = document.getElementById('mainImage');
    mainImage.src = imageSrc;
    
    // Update thumbnail borders
    const thumbnails = document.querySelectorAll('[id^="thumbnail-"]');
    thumbnails.forEach(function(thumbnail, index) {
        if (index === thumbnailIndex) {
            thumbnail.classList.remove('border', 'border-gray-200');
            thumbnail.classList.add('border-2', 'border-purple-600');
        } else {
            thumbnail.classList.remove('border-2', 'border-purple-600');
            thumbnail.classList.add('border', 'border-gray-200');
        }
    });
}

// Auto-select first color and size
document.addEventListener('DOMContentLoaded', function() {
    // Find and click first color button
    var firstColorButton = document.querySelector('button[onclick*="selectColor"]');
    if (firstColorButton) {
        firstColorButton.click();
    }
    
    // Find and click first size button
    var firstSizeButton = document.querySelector('button.w-12.h-12');
    if (firstSizeButton) {
        firstSizeButton.click();
    }
    
    // Initialize rating stars
    setRating(5);
});
</script>
