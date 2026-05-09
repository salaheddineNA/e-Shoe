@extends('layouts.admin')

@section('title', 'Modifier un Administrateur - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.admins.index') }}" 
               class="text-gray-600 hover:text-gray-900 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span>Retour aux administrateurs</span>
            </a>
            <div class="h-6 w-px bg-gray-300"></div>
            <h1 class="text-3xl font-bold text-gray-900">Modifier un Administrateur</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Edit Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <form method="POST" action="{{ route('admin.admins.update', $admin->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Basic Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations de base</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nom complet *
                                </label>
                                <input type="text" id="name" name="name" required
                                       value="{{ $admin->name }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                       placeholder="Jean Dupont">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email professionnel *
                                </label>
                                <input type="email" id="email" name="email" required
                                       value="{{ $admin->email }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                       placeholder="admin@example.com">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Permissions -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Permissions</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox" id="can_manage_products" name="permissions[]" value="manage_products" 
                                       {{ in_array('manage_products', $admin->getPermissionNames()) ? 'checked' : '' }}
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="can_manage_products" class="ml-3 text-sm text-gray-700">
                                    Gérer les produits
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="can_manage_orders" name="permissions[]" value="manage_orders" 
                                       {{ in_array('manage_orders', $admin->getPermissionNames()) ? 'checked' : '' }}
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="can_manage_orders" class="ml-3 text-sm text-gray-700">
                                    Gérer les commandes
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="can_manage_contacts" name="permissions[]" value="manage_contacts" 
                                       {{ in_array('manage_contacts', $admin->getPermissionNames()) ? 'checked' : '' }}
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="can_manage_contacts" class="ml-3 text-sm text-gray-700">
                                    Gérer les messages de contact
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="can_manage_admins" name="permissions[]" value="manage_admins" 
                                       {{ in_array('manage_admins', $admin->getPermissionNames()) ? 'checked' : '' }}
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="can_manage_admins" class="ml-3 text-sm text-gray-700">
                                    Gérer les administrateurs
                                </label>
                            </div>
                        </div>
                        
                        <!-- Permission Info -->
                        <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                            <h4 class="text-sm font-medium text-blue-900 mb-2">Description des permissions :</h4>
                            <ul class="text-sm text-blue-700 space-y-1">
                                <li><strong>Gérer les produits :</strong> Créer, modifier, supprimer des produits</li>
                                <li><strong>Gérer les commandes :</strong> Voir et modifier les statuts des commandes</li>
                                <li><strong>Gérer les messages de contact :</strong> Consulter et répondre aux messages</li>
                                <li><strong>Gérer les administrateurs :</strong> Créer, modifier, supprimer des comptes admin</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.admins.index') }}" 
                           class="text-gray-600 hover:text-gray-900 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span>Annuler</span>
                        </a>
                        <button type="submit" 
                                class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-indigo-700 transition-colors flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Enregistrer les modifications</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Admin Info Card -->
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-6 border border-indigo-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Informations de l'administrateur
                </h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                            {{ substr($admin->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">{{ $admin->name }}</p>
                            <p class="text-gray-600">{{ $admin->email }}</p>
                        </div>
                    </div>
                    <div class="pt-3 border-t border-indigo-200">
                        <p class="text-gray-600"><strong>Date de création :</strong> {{ $admin->created_at->format('d/m/Y') }}</p>
                        <p class="text-gray-600"><strong>ID :</strong> #{{ $admin->id }}</p>
                        <p class="text-gray-600"><strong>Permissions actuelles :</strong> {{ $admin->permissions()->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Security Warning -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-yellow-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    Attention
                </h3>
                <div class="text-sm text-yellow-800 space-y-2">
                    <p>La modification des permissions affecte immédiatement les accès de cet administrateur.</p>
                    <p>Assurez-vous que les permissions sont appropriées pour le rôle de cet administrateur.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
