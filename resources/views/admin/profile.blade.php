@extends('layouts.admin')

@section('title', 'Profil Administrateur - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.dashboard') }}" 
               class="text-gray-600 hover:text-gray-900 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span>Retour au tableau de bord</span>
            </a>
            <div class="h-6 w-px bg-gray-300"></div>
            <h1 class="text-3xl font-bold text-gray-900">Mon Profil</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Profile Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900">Informations personnelles</h2>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-sm text-gray-600">En ligne</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Profile Avatar -->
                    <div class="flex items-center space-x-6 mb-6">
                        <div class="relative">
                            <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                                {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                            </div>
                            <div class="absolute bottom-0 right-0 w-8 h-8 bg-green-500 rounded-full border-4 border-white flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ Auth::guard('admin')->user()->name }}</h3>
                            <p class="text-gray-600">{{ Auth::guard('admin')->user()->email }}</p>
                            <p class="text-sm text-gray-500 mt-1">Administrateur système</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nom complet
                            </label>
                            <input type="text" id="name" name="name" required
                                   value="{{ Auth::guard('admin')->user()->name }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email professionnel
                            </label>
                            <input type="email" id="email" name="email" required
                                   value="{{ Auth::guard('admin')->user()->email }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <div class="mt-2 text-xs text-gray-500">
                                ⚠️ Si vous modifiez l'email, votre mot de passe actuel sera requis
                            </div>
                        </div>
                    </div>

                    <!-- Password confirmation for email change -->
                    <div id="password-confirm-section" class="hidden">
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                Confirmer avec votre mot de passe actuel
                            </label>
                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent pr-12">
                                <button type="button" onclick="togglePassword('password_confirmation')" 
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2 text-xs text-gray-600">
                                Pour des raisons de sécurité, veuillez confirmer votre mot de passe actuel pour modifier votre adresse email.
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <div class="flex items-center space-x-2 mb-1">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Email vérifié</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Compte actif</span>
                            </div>
                        </div>
                        <button type="submit" 
                                class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                            Mettre à jour le profil
                        </button>
                    </div>
                </form>
            </div>

            <!-- Change Password -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">Changer le mot de passe</h2>
                    <p class="text-gray-600">Assurez la sécurité de votre compte en utilisant un mot de passe fort</p>
                </div>

                <form method="POST" action="{{ route('admin.password.change') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                            Mot de passe actuel
                        </label>
                        <div class="relative">
                            <input type="password" id="current_password" name="current_password" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent pr-12">
                            <button type="button" onclick="togglePassword('current_password')" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">
                            Nouveau mot de passe
                        </label>
                        <div class="relative">
                            <input type="password" id="new_password" name="new_password" required minlength="8"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent pr-12">
                            <button type="button" onclick="togglePassword('new_password')" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-2">
                            <div class="text-xs text-gray-500 mb-2">Le mot de passe doit contenir :</div>
                            <div class="space-y-1">
                                <div class="flex items-center text-xs" id="length-check">
                                    <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Au moins 8 caractères
                                </div>
                                <div class="flex items-center text-xs" id="match-check">
                                    <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Les mots de passe correspondent
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirmer le nouveau mot de passe
                        </label>
                        <div class="relative">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required minlength="8"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent pr-12">
                            <button type="button" onclick="togglePassword('new_password_confirmation')" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span>Dernière modification : Il y a 30 jours</span>
                            </div>
                        </div>
                        <button type="submit" 
                                class="bg-red-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-red-700 transition-colors">
                            Changer le mot de passe
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Stats -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistiques du compte</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Date de création</span>
                        <span class="font-medium text-gray-900">{{ Auth::guard('admin')->user()->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Dernière connexion</span>
                        <span class="font-medium text-gray-900">Aujourd'hui</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Rôle</span>
                        <span class="font-medium text-gray-900">Administrateur</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Statut</span>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            Actif
                        </span>
                    </div>
                </div>
            </div>

            <!-- Security Tips -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Conseils de sécurité
                </h3>
                <ul class="space-y-3 text-sm text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Utilisez un mot de passe unique et complexe
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Changez votre mot de passe régulièrement
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Ne partagez jamais vos identifiants
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Déconnectez-vous après utilisation
                    </li>
                </ul>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions rapides</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="w-full bg-gray-100 text-gray-800 text-center py-3 px-4 rounded-lg font-medium hover:bg-gray-200 transition-colors flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Tableau de bord</span>
                    </a>
                    
                    <form method="POST" action="{{ route('admin.logout') }}" 
                          onsubmit="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
                        @csrf
                        <button type="submit" 
                                class="w-full bg-red-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-red-700 transition-colors flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Déconnexion</span>
                        </button>
                    </form>
                </div>
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

// Email change detection
document.getElementById('email').addEventListener('input', function() {
    const currentEmail = this.getAttribute('data-original-email');
    const newEmail = this.value;
    const passwordSection = document.getElementById('password-confirm-section');
    
    if (!currentEmail) {
        this.setAttribute('data-original-email', newEmail);
    } else if (newEmail !== currentEmail) {
        passwordSection.classList.remove('hidden');
    } else {
        passwordSection.classList.add('hidden');
    }
});

// Password validation
document.getElementById('new_password').addEventListener('input', function() {
    const password = this.value;
    const confirmation = document.getElementById('new_password_confirmation').value;
    
    // Length check
    const lengthCheck = document.getElementById('length-check');
    if (password.length >= 8) {
        lengthCheck.querySelector('svg').classList.remove('text-gray-400');
        lengthCheck.querySelector('svg').classList.add('text-green-500');
    } else {
        lengthCheck.querySelector('svg').classList.remove('text-green-500');
        lengthCheck.querySelector('svg').classList.add('text-gray-400');
    }
    
    // Match check
    const matchCheck = document.getElementById('match-check');
    if (password === confirmation && password.length >= 8) {
        matchCheck.querySelector('svg').classList.remove('text-gray-400');
        matchCheck.querySelector('svg').classList.add('text-green-500');
    } else {
        matchCheck.querySelector('svg').classList.remove('text-green-500');
        matchCheck.querySelector('svg').classList.add('text-gray-400');
    }
});

document.getElementById('new_password_confirmation').addEventListener('input', function() {
    const password = document.getElementById('new_password').value;
    const confirmation = this.value;
    
    // Match check
    const matchCheck = document.getElementById('match-check');
    if (password === confirmation && password.length >= 8) {
        matchCheck.querySelector('svg').classList.remove('text-gray-400');
        matchCheck.querySelector('svg').classList.add('text-green-500');
    } else {
        matchCheck.querySelector('svg').classList.remove('text-green-500');
        matchCheck.querySelector('svg').classList.add('text-gray-400');
    }
});

// Initialize original email on page load
document.addEventListener('DOMContentLoaded', function() {
    const emailField = document.getElementById('email');
    if (emailField) {
        emailField.setAttribute('data-original-email', emailField.value);
    }
});
</script>
@endsection
