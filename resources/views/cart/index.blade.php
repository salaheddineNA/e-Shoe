@extends('layouts.shop')

@section('title', 'Mon Panier')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight p-6">
        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-600 bg-gradient-to-r from-orange-500 to-red-600">
            Mon Panier
        </span>
    </h1>

    @if($cart->cartItems->isEmpty())
        <div class="text-center py-12">
            <div class="bg-white rounded-lg shadow-md p-8 max-w-md mx-auto">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Votre panier est vide</h2>
                <p class="text-gray-600 mb-6">Ajoutez des produits pour commencer vos achats</p>
                <a href="{{ route('products.index') }}" 
                   class="inline-block bg-gradient-to-r from-orange-500 to-red-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                    Voir les produits
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart->cartItems as $item)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center space-x-4">
                            <img src="{{ $item->product->getMainImage() }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="w-24 h-24 object-cover rounded">
                            
                            <div class="flex-1">
                                <h3 class="font-semibold text-lg text-gray-900">{{ $item->product->name }}</h3>
                                <p class="text-gray-600">{{ $item->product->brand }}</p>
                                
                                @if($item->color)
                                    <div class="flex items-center space-x-2 mt-1">
                                        <span class="text-gray-600 text-sm">Couleur:</span>
                                        <div class="flex items-center space-x-1">
                                            <div class="w-4 h-4 rounded-full 
                                                @if($item->color == 'Noir') bg-black
                                                @elseif($item->color == 'Blanc') bg-white border border-gray-300
                                                @elseif($item->color == 'Rouge') bg-red-500
                                                @elseif($item->color == 'Bleu') bg-blue-500
                                                @elseif($item->color == 'Vert') bg-green-500
                                                @elseif($item->color == 'Jaune') bg-yellow-400
                                                @elseif($item->color == 'Violet') bg-purple-500
                                                @elseif($item->color == 'Orange') bg-orange-500
                                                @elseif($item->color == 'Rose') bg-pink-400
                                                @elseif($item->color == 'Gris') bg-gray-500
                                                @elseif($item->color == 'Marron') bg-amber-700
                                                @elseif($item->color == 'Marine') bg-blue-900
                                                @else bg-gray-400
                                                @endif
                                                {{ $item->color === 'Blanc' ? 'border border-gray-300' : '' }}"></div>
                                            <span class="text-sm font-medium">{{ $item->color }}</span>
                                        </div>
                                    </div>
                                @endif
                                
                                @if($item->size)
                                    <div class="flex items-center space-x-2 mt-1">
                                        <span class="text-gray-600 text-sm">Pointure:</span>
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-medium">{{ $item->size }}</span>
                                    </div>
                                @endif
                                
                                <!-- Price Display -->
                                <div class="mt-2">
                                    @if($item->product->isCurrentlyOnSale())
                                        <div class="flex items-center space-x-2">
                                            <span class="text-lg font-bold text-green-600">{{ $item->formatted_unit_price }}</span>
                                            <span class="text-sm text-gray-400 line-through">{{ $item->formatted_original_unit_price }}</span>
                                            <span class="bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">
                                                -{{ $item->product->getDiscountPercentage() }}%
                                            </span>
                                        </div>
                                        @if($item->discount_amount > 0)
                                            <p class="text-xs text-green-600 mt-1">Économie: {{ $item->formatted_discount_amount }}</p>
                                        @endif
                                    @else
                                        <span class="text-lg font-bold text-gray-900">{{ $item->formatted_unit_price }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PUT')
                                        <select name="quantity" 
                                                onchange="this.form.submit()"
                                                class="w-20 border border-gray-300 rounded py-1 px-2 text-center">
                                            @for($i = 1; $i <= min(10, $item->product->stock_quantity); $i++)
                                                <option value="{{ $i }}" {{ $i == $item->quantity ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </form>
                                </div>
                                
                                <div class="text-right">
                                    <p class="font-semibold text-lg">{{ $item->formatted_subtotal }}</p>
                                    @if($item->product->isCurrentlyOnSale() && $item->discount_amount > 0)
                                        <p class="text-xs text-green-600">Économie: {{ $item->formatted_discount_amount }}</p>
                                    @endif
                                </div>
                                
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 transition-colors"
                                            onclick="return confirm('Êtes-vous sûr de vouloir retirer cet article?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Résumé de la commande</h2>
                    
                    @php
                        $originalTotal = $cart->cartItems->sum(function($item) {
                            return $item->quantity * $item->original_unit_price;
                        });
                        $discountTotal = $originalTotal - $cart->total;
                        $shippingCost = $cart->total >= 100 ? 0 : 5.90;
                        $finalTotal = $cart->total + $shippingCost;
                    @endphp
                    
                    <div class="space-y-3 mb-6">
                        @if($discountTotal > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total original</span>
                                <span class="font-medium text-gray-400 line-through">{{ number_format($originalTotal, 2, ',', ' ') }} €</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-green-600">Remise totale</span>
                                <span class="font-medium text-green-600">-{{ number_format($discountTotal, 2, ',', ' ') }} €</span>
                            </div>
                        @endif
                        
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sous-total</span>
                            <span class="font-medium">{{ number_format($cart->total, 2, ',', ' ') }} €</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Livraison</span>
                            <span class="font-medium">{{ $shippingCost == 0 ? 'Gratuite' : number_format($shippingCost, 2, ',', ' ') . ' €' }}</span>
                        </div>
                        <div class="border-t pt-3">
                            <div class="flex justify-between">
                                <span class="text-lg font-semibold">Total</span>
                                <span class="text-lg font-bold text-blue-600">
                                    {{ number_format($finalTotal, 2, ',', ' ') }} €
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    @if($discountTotal > 0)
                        <div class="bg-green-50 border border-green-200 rounded-lg p-3 mb-4">
                            <p class="text-green-800 text-sm">🎉 Vous économisez {{ number_format($discountTotal, 2, ',', ' ') }} € grâce aux promotions!</p>
                        </div>
                    @endif

                    @if($cart->total >= 100)
                        <div class="bg-green-50 border border-green-200 rounded-lg p-3 mb-4">
                            <p class="text-green-800 text-sm">🎉 Livraison gratuite offerte!</p>
                        </div>
                    @else
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-4">
                            <p class="text-blue-800 text-sm">
                                Plus que {{ number_format(100 - $cart->total, 2, ',', ' ') }} € pour la livraison gratuite!
                            </p>
                        </div>
                    @endif

                    <a href="{{ route('orders.create') }}" 
                       class="block w-full bg-gradient-to-r from-orange-500 to-red-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors font-semibold text-center">
                        Passer la commande
                    </a>

                    <a href="{{ route('products.index') }}" 
                       class="block w-full mt-3 bg-gray-200 text-gray-800 py-3 px-6 rounded-lg hover:bg-gray-300 transition-colors text-center">
                        Continuer mes achats
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
