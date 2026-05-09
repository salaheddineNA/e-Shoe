@extends('layouts.admin')

@section('title', 'Détails de la commande')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.orders') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">
            ← Retour aux commandes
        </a>
        <h1 class="text-3xl font-bold text-gray-900">Commande #{{ $order->order_number }}</h1>
        <p class="text-gray-600">Créée le {{ $order->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <!-- Quick Order Summary for Processing -->
    <div class="mb-8 bg-gradient-to-r from-orange-50 to-red-50 rounded-xl shadow-xl border-2 border-orange-200 p-6">
        <h2 class="text-2xl font-bold text-orange-900 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-3 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            Résumé rapide pour la préparation
        </h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Customer Quick Info -->
            <div class="bg-white rounded-lg p-4 shadow-sm border border-orange-200">
                <h3 class="text-sm font-bold text-orange-700 mb-3">Client</h3>
                <div class="space-y-1 text-sm">
                    <p><span class="font-medium">Nom:</span> {{ $order->customer_name }}</p>
                    <p><span class="font-medium">Téléphone:</span> {{ $order->customer_phone }}</p>
                    <p><span class="font-medium">Adresse:</span> {{ $order->shipping_address }}</p>
                </div>
            </div>
            
            <!-- Order Quick Info -->
            <div class="bg-white rounded-lg p-4 shadow-sm border border-orange-200">
                <h3 class="text-sm font-bold text-orange-700 mb-3">Commande</h3>
                <div class="space-y-1 text-sm">
                    <p><span class="font-medium">Numéro:</span> #{{ $order->order_number }}</p>
                    <p><span class="font-medium">Date:</span> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <p><span class="font-medium">Total:</span> {{ number_format($order->total_amount >= 100 ? $order->total_amount : $order->total_amount + 5.90, 2, ',', ' ') }} €</p>
                </div>
            </div>
        </div>
        
        <!-- Items Summary Table -->
        <div class="mt-6 bg-white rounded-lg p-4 shadow-sm border border-orange-200">
            <h3 class="text-sm font-bold text-orange-700 mb-4">Articles à préparer</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-orange-50">
                        <tr>
                            <th class="px-3 py-2 text-left font-medium text-orange-900">Article</th>
                            <th class="px-3 py-2 text-left font-medium text-orange-900">Couleur</th>
                            <th class="px-3 py-2 text-left font-medium text-orange-900">Pointure</th>
                            <th class="px-3 py-2 text-center font-medium text-orange-900">Qté</th>
                            <th class="px-3 py-2 text-right font-medium text-orange-900">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-orange-100">
                        @foreach($order->orderItems as $item)
                        <tr class="hover:bg-orange-50">
                            <td class="px-3 py-2">
                                <div class="font-medium text-gray-900">{{ $item->product_name }}</div>
                                @if($item->product_brand)
                                    <div class="text-xs text-gray-500">{{ $item->product_brand }}</div>
                                @endif
                            </td>
                            <td class="px-3 py-2">
                                @if($item->color)
                                    @php
                                        $selectedColors = array_map('trim', explode(',', $item->color));
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
                                    <div class="flex items-center space-x-1">
                                        @foreach($selectedColors as $color)
                                            <div class="flex items-center space-x-1">
                                                <div class="w-3 h-3 rounded-full {{ $colorMap[trim($color)] ?? 'bg-gray-400' }} {{ trim($color) === 'Blanc' ? 'border border-gray-300' : '' }}"></div>
                                                <span class="text-xs">{{ trim($color) }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-2">
                                @if($item->size)
                                    @php
                                        $selectedSizes = array_map('trim', explode(',', $item->size));
                                    @endphp
                                    <div class="flex items-center space-x-1">
                                        @foreach($selectedSizes as $size)
                                            <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs font-medium">{{ trim($size) }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-2 text-center">
                                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs font-medium">{{ $item->quantity }}</span>
                            </td>
                            <td class="px-3 py-2 text-right font-medium">
                                {{ number_format($item->subtotal, 2, ',', ' ') }} €
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Customer Info -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl shadow-xl border-2 border-indigo-200 p-6">
                <h2 class="text-2xl font-bold text-indigo-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Informations client complètes
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Information -->
                    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
                        <h3 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informations personnelles
                        </h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Nom:</span>
                                <span class="font-semibold text-gray-900">{{ $order->customer_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Email:</span>
                                <span class="font-semibold text-gray-900">{{ $order->customer_email }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Téléphone:</span>
                                <span class="font-semibold text-gray-900">{{ $order->customer_phone }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Information -->
                    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
                        <h3 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Informations de commande
                        </h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Numéro:</span>
                                <span class="font-bold text-indigo-600">#{{ $order->order_number }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Date:</span>
                                <span class="font-semibold text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Paiement:</span>
                                <span class="font-semibold text-green-600">Paiement à la livraison</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Address -->
                <div class="mt-6 bg-white rounded-lg p-4 shadow-sm border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Adresse de livraison
                    </h3>
                    <p class="font-medium text-gray-900 bg-gray-50 p-3 rounded-lg">{{ $order->shipping_address }}</p>
                </div>
                
                <!-- Customer Notes -->
                @if($order->notes)
                <div class="mt-6 bg-white rounded-lg p-4 shadow-sm border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Notes du client
                    </h3>
                    <p class="font-medium text-gray-900 bg-yellow-50 p-3 rounded-lg border border-yellow-200">{{ $order->notes }}</p>
                </div>
                @endif
            </div>

            <!-- Order Items -->
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl shadow-xl border-2 border-indigo-200 p-6">
                <h2 class="text-2xl font-bold text-indigo-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Détails complets des articles commandés
                </h2>
                
                <div class="space-y-8">
                    @foreach($order->orderItems as $item)
                        <div class="bg-white rounded-xl shadow-lg border-2 border-indigo-100 overflow-hidden">
                            <!-- Product Header -->
                            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-indigo-600 font-bold text-lg">{{ $loop->index + 1 }}</span>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-white">{{ $item->product_name }}</h3>
                                            @if($item->product_brand)
                                                <span class="text-indigo-100 text-sm font-medium">{{ $item->product_brand }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-white">{{ number_format($item->subtotal, 2, ',', ' ') }} €</p>
                                        <p class="text-indigo-100 text-sm">Sous-total</p>
                                    </div>
                                </div>
                                
                                <!-- Quick Summary Bar -->
                                @if($item->color || $item->size)
                                <div class="mt-4 bg-white/20 backdrop-blur rounded-lg p-3">
                                    <div class="flex flex-wrap items-center gap-4 text-white">
                                        @if($item->color)
                                            <div class="flex items-center space-x-2">
                                                <span class="text-sm font-medium">Couleur:</span>
                                                <div class="flex items-center space-x-1">
                                                    @php
                                                        $selectedColors = explode(',', $item->color);
                                                        $colorMap = [
                                                            'Noir' => 'bg-black',
                                                            'Blanc' => 'bg-white border-white',
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
                                                    @foreach($selectedColors as $color)
                                                        <div class="flex items-center space-x-1">
                                                            <div class="w-4 h-4 rounded-full {{ $colorMap[trim($color)] ?? 'bg-gray-400' }} {{ trim($color) === 'Blanc' ? 'border border-gray-300' : '' }}"></div>
                                                            <span class="text-xs font-bold">{{ trim($color) }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($item->size)
                                            <div class="flex items-center space-x-2">
                                                <span class="text-sm font-medium">Pointure:</span>
                                                <div class="flex items-center space-x-1">
                                                    @php
                                                        $selectedSizes = explode(', ', $item->size);
                                                    @endphp
                                                    @foreach($selectedSizes as $size)
                                                        <span class="bg-white/30 px-2 py-1 rounded text-xs font-bold">{{ trim($size) }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <div class="flex items-center space-x-2 ml-auto">
                                            <span class="text-sm font-medium">Qté:</span>
                                            <span class="bg-white/30 px-2 py-1 rounded text-xs font-bold">{{ $item->quantity }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Product Details -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                                    <!-- Product Image -->
                                    <div class="lg:col-span-1">
                                        <div class="relative">
                                            <img src="{{ $item->product_image }}" 
                                                 alt="{{ $item->product_name }}" 
                                                 class="w-full h-48 object-cover rounded-xl shadow-lg">
                                            <div class="absolute top-2 right-2 bg-white rounded-full px-3 py-1 shadow-lg">
                                                <span class="text-xs font-bold text-indigo-600">Réf: {{ $item->product_id }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Customer Selections -->
                                    <div class="lg:col-span-3 space-y-4">
                                        <!-- Selections Header -->
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-4 border border-indigo-200">
                                            <h4 class="text-lg font-bold text-indigo-900 mb-4 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Sélections spécifiques du client
                                            </h4>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <!-- Color Selection -->
                                                @if($item->color)
                                                <div class="bg-white rounded-lg p-4 border-2 border-purple-200 shadow-sm">
                                                    <h5 class="text-sm font-bold text-purple-900 mb-3 flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                                        </svg>
                                                        🎨 Couleur(s) choisie(s)
                                                    </h5>
                                                    <div class="space-y-2">
                                                        @php
                                                            $selectedColors = array_map('trim', explode(',', $item->color));
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
                                                        
                                                        @foreach($selectedColors as $color)
                                                            <div class="flex items-center space-x-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg px-4 py-3 border border-purple-200">
                                                                <div class="w-8 h-8 rounded-full {{ $colorMap[trim($color)] ?? 'bg-gray-400' }} {{ trim($color) === 'Blanc' ? 'border border-gray-300' : '' }} shadow-lg"></div>
                                                                <div>
                                                                    <span class="text-sm font-bold text-purple-900">{{ trim($color) }}</span>
                                                                    <p class="text-xs text-purple-600">Couleur sélectionnée</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                
                                                <!-- Size Selection -->
                                                @if($item->size)
                                                <div class="bg-white rounded-lg p-4 border-2 border-blue-200 shadow-sm">
                                                    <h5 class="text-sm font-bold text-blue-900 mb-3 flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                                        </svg>
                                                        👟 Pointure(s) choisie(s)
                                                    </h5>
                                                    <div class="space-y-2">
                                                        @php
                                                            $selectedSizes = array_map('trim', explode(',', $item->size));
                                                        @endphp
                                                        
                                                        @foreach($selectedSizes as $size)
                                                            <div class="flex items-center space-x-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg px-4 py-3 border border-blue-200">
                                                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg flex items-center justify-center shadow-lg">
                                                                    <span class="font-bold">{{ trim($size) }}</span>
                                                                </div>
                                                                <div>
                                                                    <span class="text-sm font-bold text-blue-900">Pointure {{ trim($size) }}</span>
                                                                    <p class="text-xs text-blue-600">Taille sélectionnée</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <!-- Quantity and Price Details -->
                                        <div class="bg-gradient-to-r from-gray-50 to-indigo-50 rounded-lg p-4 border border-gray-200">
                                            <h5 class="text-sm font-bold text-gray-900 mb-3 flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Informations de prix et quantité
                                            </h5>
                                            <div class="grid grid-cols-3 gap-4">
                                                <div class="bg-white rounded-lg p-3 text-center shadow-sm border border-gray-200">
                                                    <p class="text-xs text-gray-600 mb-1">Quantité</p>
                                                    <p class="text-2xl font-bold text-gray-900">{{ $item->quantity }}</p>
                                                    <p class="text-xs text-gray-500">unité(s)</p>
                                                </div>
                                                <div class="bg-white rounded-lg p-3 text-center shadow-sm border border-gray-200">
                                                    <p class="text-xs text-gray-600 mb-1">Prix unitaire</p>
                                                    <p class="text-2xl font-bold text-gray-900">{{ number_format($item->price, 2, ',', ' ') }} €</p>
                                                    <p class="text-xs text-gray-500">par unité</p>
                                                </div>
                                                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg p-3 text-center shadow-lg">
                                                    <p class="text-xs text-indigo-100 mb-1">Sous-total</p>
                                                    <p class="text-2xl font-bold">{{ number_format($item->subtotal, 2, ',', ' ') }} €</p>
                                                    <p class="text-xs text-indigo-100">total article</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-6 pt-6 border-t">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">Sous-total:</span>
                        <span class="font-medium">{{ number_format($order->total_amount, 2, ',', ' ') }} €</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">Livraison:</span>
                        <span class="font-medium">{{ $order->total_amount >= 100 ? 'Gratuite' : '5,90 €' }}</span>
                    </div>
                    <div class="flex justify-between items-center text-lg font-bold">
                        <span>Total:</span>
                        <span class="text-blue-600">
                            {{ number_format($order->total_amount >= 100 ? $order->total_amount : $order->total_amount + 5.90, 2, ',', ' ') }} €
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Management -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 sticky top-4">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Gestion de la commande
                </h2>
                
                <!-- Current Status -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Statut actuel
                    </label>
                    <span class="px-3 inline-flex text-sm leading-5 font-semibold rounded-full 
                        {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                           ($order->status == 'processing' ? 'bg-blue-100 text-blue-800' : 
                           ($order->status == 'shipped' ? 'bg-green-100 text-green-800' : 
                           'bg-gray-100 text-gray-800')) }}">
                        {{ $order->status }}
                    </span>
                </div>

                <!-- Update Status Form -->
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mb-6">
                    @csrf
                    @method('PUT')
                    
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Mettre à jour le statut
                    </label>
                    <select name="status" 
                            class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 mb-3">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>En traitement</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Expédiée</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Livrée</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                    </select>
                    
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        Mettre à jour
                    </button>
                </form>

                <!-- Status Descriptions -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="font-semibold text-gray-900 mb-3">Description des statuts</h3>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>
                            <span class="font-medium">En attente:</span> Commande reçue, en attente de traitement
                        </li>
                        <li>
                            <span class="font-medium">En traitement:</span> Commande en préparation
                        </li>
                        <li>
                            <span class="font-medium">Expédiée:</span> Commande envoyée au client
                        </li>
                        <li>
                            <span class="font-medium">Livrée:</span> Commande livrée avec succès
                        </li>
                        <li>
                            <span class="font-medium">Annulée:</span> Commande annulée
                        </li>
                    </ul>
                </div>

                <!-- Actions -->
                <div class="mt-6 space-y-3">
                    <button onclick="window.print()" 
                            class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded-lg hover:bg-gray-300 transition-colors">
                        Imprimer la commande
                    </button>
                    
                    <a href="mailto:{{ $order->customer_email }}" 
                       class="block w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors text-center">
                        Contacter le client
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
