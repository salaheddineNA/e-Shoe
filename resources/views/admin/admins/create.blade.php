@extends('layouts.admin')

@section('title', 'Créer un Administrateur - Admin')

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
            <h1 class="text-3xl font-bold text-gray-900">Créer un Administrateur</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Create Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <form method="POST" action="{{ route('admin.admins.store') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations de base</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nom complet *
                                </label>
                                <input type="text" id="name" name="name" required
                                       value="{{ old('name') }}"
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
                                       value="{{ old('email') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                       placeholder="admin@example.com">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Mot de passe</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    Mot de passe *
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent pr-12"
                                           placeholder="•••••••••">
                                    <button type="button" onclick="togglePassword('password')" 
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                    Confirmer le mot de passe *
                                </label>
                                <div class="relative">
                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent pr-12"
                                           placeholder="•••••••••">
                                    <button type="button" onclick="togglePassword('password_confirmation')" 
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Password Requirements -->
                        <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                            <h4 class="text-sm font-medium text-blue-900 mb-2">Exigences du mot de passe :</h4>
                            <ul class="text-sm text-blue-700 space-y-1">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Minimum 8 caractères
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Doit correspondre à la confirmation
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Permissions -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Permissions</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox" id="can_manage_products" name="permissions[]" value="manage_products" 
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="can_manage_products" class="ml-3 text-sm text-gray-700">
                                    Gérer les produits
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="can_manage_orders" name="permissions[]" value="manage_orders" 
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="can_manage_orders" class="ml-3 text-sm text-gray-700">
                                    Gérer les commandes
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="can_manage_contacts" name="permissions[]" value="manage_contacts" 
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="can_manage_contacts" class="ml-3 text-sm text-gray-700">
                                    Gérer les messages de contact
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="can_manage_admins" name="permissions[]" value="manage_admins" 
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="can_manage_admins" class="ml-3 text-sm text-gray-700">
                                    Gérer les administrateurs
                                </label>
                            </div>
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
                            <span>Créer l'administrateur</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Info Card -->
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-6 border border-indigo-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Informations importantes
                </h3>
                <div class="space-y-3 text-sm text-gray-700">
                    <p>
                        <strong>Email :</strong> Sera utilisé pour la connexion
                    </p>
                    <p>
                        <strong>Mot de passe :</strong> Doit être sécurisé et unique
                    </p>
                    <p>
                        <strong>Permissions :</strong> Définissez les accès de l'administrateur
                    </p>
                </div>
            </div>

            <!-- Security Tips -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Conseils de sécurité
                </h3>
                <ul class="space-y-3 text-sm text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Utilisez un email professionnel
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Donnez uniquement les permissions nécessaires
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Communiquez les identifiants de manière sécurisée
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const type = field.type === 'password' ? 'text' : 'password';
    field.type = type;
}
</script>
@endsection
