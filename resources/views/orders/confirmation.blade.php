@extends('layouts.shop')

@section('title', 'Confirmation de commande')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Commande confirmée!</h1>
        <p class="text-gray-600">Merci pour votre commande. Nous vous contacterons bientôt pour la livraison.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order Details -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Détails de la commande</h2>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Numéro de commande:</span>
                        <span class="font-medium">{{ $order->order_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date:</span>
                        <span class="font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Statut:</span>
                        <span class="font-medium text-yellow-600">{{ $order->status }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Méthode de paiement:</span>
                        <span class="font-medium">Paiement à la livraison</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Informations de livraison</h2>
                
                <div class="space-y-3">
                    <div>
                        <span class="text-gray-600">Nom:</span>
                        <p class="font-medium">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <span class="text-gray-600">Email:</span>
                        <p class="font-medium">{{ $order->customer_email }}</p>
                    </div>
                    <div>
                        <span class="text-gray-600">Téléphone:</span>
                        <p class="font-medium">{{ $order->customer_phone }}</p>
                    </div>
                    <div>
                        <span class="text-gray-600">Adresse de livraison:</span>
                        <p class="font-medium">{{ $order->shipping_address }}</p>
                    </div>
                    @if($order->notes)
                        <div>
                            <span class="text-gray-600">Notes:</span>
                            <p class="font-medium">{{ $order->notes }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Articles commandés</h2>
                
                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                        <div class="flex items-center space-x-4 border-b pb-4 last:border-b-0">
                            <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold">{{ $item->product_name }}</h3>
                                <p class="text-gray-600">Quantité: {{ $item->quantity }}</p>
                                <p class="text-gray-600">Prix unitaire: {{ number_format($item->price, 2, ',', ' ') }} €</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold">{{ number_format($item->subtotal, 2, ',', ' ') }} €</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Résumé</h2>
                
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Sous-total</span>
                        <span class="font-medium">{{ number_format($order->total_amount, 2, ',', ' ') }} €</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Livraison</span>
                        <span class="font-medium">{{ $order->total_amount >= 100 ? 'Gratuite' : '5,90 €' }}</span>
                    </div>
                    <div class="border-t pt-3">
                        <div class="flex justify-between">
                            <span class="text-lg font-semibold">Total payé</span>
                            <span class="text-lg font-bold text-blue-600">
                                {{ number_format($order->total_amount >= 100 ? $order->total_amount : $order->total_amount + 5.90, 2, ',', ' ') }} €
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <h3 class="font-semibold text-blue-900 mb-2">Prochaines étapes</h3>
                    <ul class="text-sm text-blue-800 space-y-1">
                        <li>• Nous traitons votre commande dans les 24h</li>
                        <li>• Vous recevrez un email de confirmation</li>
                        <li>• Livraison prévue dans 3-5 jours ouvrables</li>
                        <li>• Paiement à la réception des articles</li>
                    </ul>
                </div>

                <div class="space-y-3">
                    <a href="{{ route('orders.download-proof', $order->order_number) }}" 
                       class="block w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors text-center flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Télécharger</span>
                    </a>
                    
                    <a href="{{ route('products.index') }}" 
                       class="block w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors text-center">
                        Continuer mes achats
                    </a>
                    
                    <a href="{{ route('home') }}" 
                       class="block w-full bg-gray-200 text-gray-800 py-2 px-4 rounded-lg hover:bg-gray-300 transition-colors text-center">
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
