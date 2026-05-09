@extends('layouts.admin')

@section('title', 'Tableau de bord Admin - ShoeStore')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Tableau de bord</h1>
        <p class="text-gray-600">Gérez votre boutique de chaussures</p>
    </div>

    <!-- Enhanced Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Produits</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalProducts }}</p>
                    <p class="text-green-600 text-sm mt-2">Actifs</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Commandes</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalOrders }}</p>
                    <p class="text-blue-600 text-sm mt-2">{{ $completedOrders }} complétées</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Revenus</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalRevenue, 0, ',', ' ') }}€</p>
                    <p class="text-green-600 text-sm mt-2">+{{ number_format($monthRevenue, 0, ',', ' ') }}€ ce mois</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_contacts') || Auth::guard('admin')->user()->isSuperAdmin()))
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Messages de contact</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ App\Models\ContactMessage::where('status', 'new')->count() }}</p>
                    <p class="text-orange-600 text-sm mt-2">Nouveaux messages</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Stock Alerts -->
    @if($lowStockProducts->count() > 0 || $outOfStockProducts->count() > 0)
    <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6 mb-8">
        <h3 class="text-lg font-bold text-red-900 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
            Alertes de stock
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @if($outOfStockProducts->count() > 0)
                <div class="bg-red-100 rounded-lg p-4">
                    <h4 class="font-semibold text-red-800 mb-2">Produits en rupture de stock ({{ $outOfStockProducts->count() }})</h4>
                    <div class="space-y-1">
                        @foreach($outOfStockProducts->take(3) as $product)
                            <div class="text-sm text-red-700">{{ $product->name }} - Stock: {{ $product->stock_quantity }}</div>
                        @endforeach
                        @if($outOfStockProducts->count() > 3)
                            <div class="text-sm text-red-600 font-medium">...et {{ $outOfStockProducts->count() - 3 }} autres</div>
                        @endif
                    </div>
                </div>
            @endif
            @if($lowStockProducts->count() > 0)
                <div class="bg-yellow-100 rounded-lg p-4">
                    <h4 class="font-semibold text-yellow-800 mb-2">Stock faible ({{ $lowStockProducts->count() }})</h4>
                    <div class="space-y-1">
                        @foreach($lowStockProducts->take(3) as $product)
                            <div class="text-sm text-yellow-700">{{ $product->name }} - Stock: {{ $product->stock_quantity }}</div>
                        @endforeach
                        @if($lowStockProducts->count() > 3)
                            <div class="text-sm text-yellow-600 font-medium">...et {{ $lowStockProducts->count() - 3 }} autres</div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Quick Actions & Navigation -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Quick Actions -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Actions rapides
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_products') || Auth::guard('admin')->user()->isSuperAdmin()))
                <a href="{{ route('admin.products.create') }}" 
                   class="group bg-gradient-to-r from-blue-500 to-blue-600 text-white p-4 rounded-xl hover:shadow-lg transition-all transform hover:scale-105 flex items-center justify-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span class="font-semibold">Ajouter un produit</span>
                </a>
                @endif
                
                @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_orders') || Auth::guard('admin')->user()->isSuperAdmin()))
                <a href="{{ route('admin.orders') }}" 
                   class="group bg-gradient-to-r from-green-500 to-green-600 text-white p-4 rounded-xl hover:shadow-lg transition-all transform hover:scale-105 flex items-center justify-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span class="font-semibold">Voir les commandes</span>
                </a>
                @endif
                
                @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_products') || Auth::guard('admin')->user()->isSuperAdmin()))
                <a href="{{ route('admin.products') }}" 
                   class="group bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-xl hover:shadow-lg transition-all transform hover:scale-105 flex items-center justify-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="font-semibold">Gérer les produits</span>
                </a>
                @endif
                
                @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_contacts') || Auth::guard('admin')->user()->isSuperAdmin()))
                <a href="{{ route('admin.contact-messages') }}" 
                   class="group bg-gradient-to-r from-orange-500 to-red-500 text-white p-4 rounded-xl hover:shadow-lg transition-all transform hover:scale-105 flex items-center justify-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-semibold">Messages de contact</span>
                </a>
                @endif
                
                <a href="{{ route('home') }}" 
                   class="group bg-gradient-to-r from-gray-500 to-gray-600 text-white p-4 rounded-xl hover:shadow-lg transition-all transform hover:scale-105 flex items-center justify-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-semibold">Voir la boutique</span>
                </a>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-lg p-8 text-white">
            <h2 class="text-xl font-bold mb-6">Aperçu rapide</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-indigo-100">Revenus du mois</span>
                    <span class="font-bold text-lg">€2,450</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-indigo-100">Nouveaux clients</span>
                    <span class="font-bold text-lg">+24</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-indigo-100">Taux de satisfaction</span>
                    <span class="font-bold text-lg">98%</span>
                </div>
                <div class="pt-4 border-t border-indigo-400">
                    <div class="text-center">
                        <p class="text-indigo-100 text-sm">Performance globale</p>
                        <div class="text-3xl font-bold mt-2">A+</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_orders') || Auth::guard('admin')->user()->isSuperAdmin()))
    <!-- Recent Orders -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                    <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Commandes récentes
                </h2>
                <a href="{{ route('admin.orders') }}" 
                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors flex items-center space-x-2">
                    <span>Voir tout</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        @endif
        
        @if($recentOrders->isEmpty())
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                </div>
                <p class="text-gray-500 font-medium">Aucune commande récente</p>
                <p class="text-gray-400 text-sm mt-2">Les nouvelles commandes apparaîtront ici</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Commande
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Client
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Total
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Statut
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($recentOrders as $order)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-indigo-600 font-semibold text-sm">#{{ substr($order->order_number, -3) }}</span>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $order->order_number }}</div>
                                            <div class="text-sm text-gray-500">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-8 h-8 bg-gray-200 rounded-full mr-3"></div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $order->customer_name }}</div>
                                            <div class="text-sm text-gray-500">{{ $order->customer_email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <div class="text-lg font-bold text-gray-900">
                                        {{ number_format($order->total_amount, 2, ',', ' ') }} €
                                    </div>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           ($order->status == 'processing' ? 'bg-blue-100 text-blue-800' : 
                                           ($order->status == 'shipped' ? 'bg-green-100 text-green-800' : 
                                           'bg-gray-100 text-gray-800')) }}">
                                        {{ $order->status == 'pending' ? 'En attente' : 
                                           ($order->status == 'processing' ? 'En cours' : 
                                           ($order->status == 'shipped' ? 'Expédiée' : 
                                           $order->status)) }}
                                    </span>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 font-medium flex items-center space-x-1">
                                        <span>Voir</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_contacts') || Auth::guard('admin')->user()->isSuperAdmin()))
    <!-- Recent Contact Messages -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mt-8">
        <div class="bg-gradient-to-r from-orange-50 to-red-50 px-8 py-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                    <svg class="w-6 h-6 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Messages récents
                </h2>
                <a href="{{ route('admin.contact-messages') }}" 
                   class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors flex items-center space-x-2">
                    <span>Voir tout</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        @endif
        
        @php
            $recentMessages = App\Models\ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        @endphp
        
        @if($recentMessages->isEmpty())
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-gray-500 font-medium">Aucun message récent</p>
                <p class="text-gray-400 text-sm mt-2">Les nouveaux messages apparaîtront ici</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Client
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Sujet
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Statut
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($recentMessages as $message)
                            <tr class="hover:bg-gray-50 transition-colors {{ $message->isNew() ? 'bg-blue-50' : '' }}">
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $message->email }}</div>
                                    </div>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-900">{{ $message->getSubjectLabel() }}</span>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $message->created_at->format('d/m/Y H:i') }}</div>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $message->getStatusColor() }}">
                                        {{ $message->getStatusLabel() }}
                                    </span>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('admin.contact-messages.show', $message) }}" 
                                       class="text-orange-600 hover:text-orange-900 font-medium flex items-center space-x-1">
                                        <span>Voir</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
