@extends('layouts.shop')

@section('title', 'Finaliser la commande')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Finaliser ma commande</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order Form -->
        <div class="lg:col-span-2">
            <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Informations de livraison</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nom complet *
                            </label>
                            <input type="text" 
                                   id="customer_name" 
                                   name="customer_name" 
                                   required
                                   class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                   value="{{ old('customer_name') }}">
                            @error('customer_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email *
                            </label>
                            <input type="email" 
                                   id="customer_email" 
                                   name="customer_email" 
                                   required
                                   class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                   value="{{ old('customer_email') }}">
                            @error('customer_email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Téléphone *
                        </label>
                        <input type="tel" 
                               id="customer_phone" 
                               name="customer_phone" 
                               required
                               class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('customer_phone') }}">
                        @error('customer_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mt-4">
                        <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">
                            Adresse de livraison *
                        </label>
                        <textarea id="shipping_address" 
                                  name="shipping_address" 
                                  rows="3" 
                                  required
                                  class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mt-4">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                            Notes (optionnel)
                        </label>
                        <textarea id="notes" 
                                  name="notes" 
                                  rows="3" 
                                  class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Instructions spéciales pour la livraison...">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Méthode de paiement</h2>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-blue-900">Paiement à la livraison</p>
                                <p class="text-blue-800 text-sm">Payez lorsque vous recevez vos articles</p>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                    Confirmer la commande
                </button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Récapitulatif</h2>
                
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Sous-total ({{ $cart->total_items }} articles)</span>
                        <span class="font-medium">{{ number_format($cart->total, 2, ',', ' ') }} €</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Livraison</span>
                        <span class="font-medium">{{ $cart->total >= 100 ? 'Gratuite' : '5,90 €' }}</span>
                    </div>
                    <div class="border-t pt-3">
                        <div class="flex justify-between">
                            <span class="text-lg font-semibold">Total</span>
                            <span class="text-lg font-bold text-blue-600">
                                {{ number_format($cart->total >= 100 ? $cart->total : $cart->total + 5.90, 2, ',', ' ') }} €
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Cart Items Preview -->
                <div class="border-t pt-4">
                    <h3 class="font-semibold text-gray-900 mb-3">Articles</h3>
                    <div class="space-y-2 max-h-64 overflow-y-auto">
                        @foreach($cart->cartItems as $item)
                            <div class="flex items-center space-x-3 text-sm">
                                <img src="{{ $item->product->getMainImage() }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="w-12 h-12 object-cover rounded">
                                <div class="flex-1">
                                    <p class="font-medium">{{ $item->product->name }}</p>
                                    <p class="text-gray-600">Quantité: {{ $item->quantity }}</p>
                                </div>
                                <span class="font-medium">{{ number_format($item->subtotal, 2, ',', ' ') }} €</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
