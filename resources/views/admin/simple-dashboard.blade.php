@extends('layouts.admin')

@section('title', 'Dashboard Admin - ShoeStore')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Dashboard Header -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
                        <p class="text-gray-600 mt-1">Bienvenue dans votre panneau d'administration</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="/simple-admin/logout" 
                           class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                            🚪 Déconnexion
                        </a>
                        <a href="{{ route('home') }}" 
                           class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                            🏪 Retour Boutique
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                                📦
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Produits</h3>
                            <p class="text-gray-600">Gérer les produits</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.products') }}" 
                           class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-center">
                            Voir les produits
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center">
                                📋
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Commandes</h3>
                            <p class="text-gray-600">Gérer les commandes</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.orders') }}" 
                           class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-center">
                            Voir les commandes
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center">
                                💬
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Messages</h3>
                            <p class="text-gray-600">Messages de contact</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.contact-messages') }}" 
                           class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors text-center">
                            Voir les messages
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center">
                                👥
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Admins</h3>
                            <p class="text-gray-600">Gérer les admins</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.admins') }}" 
                           class="w-full bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors text-center">
                            Voir les admins
                        </a>
                    </div>
                </div>
            </div>

            <!-- Debug Info -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-yellow-900 mb-4">🔍 Informations de Debug</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p><strong>Admin connecté :</strong> 
                            @if(Auth::guard('admin')->check())
                                <span class="text-green-600">✅ Oui</span>
                                <span class="text-gray-600"> (ID: {{ Auth::guard('admin')->id() }})</span>
                            @else
                                <span class="text-red-600">❌ Non</span>
                            @endif
                        </p>
                        <p><strong>Email :</strong> {{ Auth::guard('admin')->user()?->email ?? 'N/A' }}</p>
                        <p><strong>Nom :</strong> {{ Auth::guard('admin')->user()?->name ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p><strong>Session ID :</strong> {{ session()->getId() }}</p>
                        <p><strong>Guard :</strong> admin</p>
                        <p><strong>Routes originales :</strong></p>
                        <ul class="list-disc list-inside text-gray-600 ml-4">
                            <li><a href="{{ route('admin.login') }}" class="text-indigo-600 hover:text-indigo-700">Login Original</a></li>
                            <li><a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-700">Dashboard Original</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
