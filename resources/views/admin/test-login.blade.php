@extends('layouts.shop')

@section('title', 'Test Connexion Admin')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Test de Connexion Admin</h1>
            
            <!-- Instructions -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                <h2 class="text-lg font-semibold text-blue-900 mb-4">Instructions de test :</h2>
                <ol class="list-decimal list-inside space-y-2 text-blue-800">
                    <li>Utilisez les identifiants : <strong>admin@shoestore.com</strong> / <strong>admin123</strong></li>
                    <li>Cliquez sur le bouton de connexion ci-dessous</li>
                    <li>Vous serez redirigé vers la page de login admin</li>
                    <li>Après connexion réussie, vous accéderez au dashboard</li>
                </ol>
            </div>
            
            <!-- Debug Info -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations de debug :</h3>
                <div class="space-y-2 text-sm">
                    <p><strong>URL de login admin :</strong> <a href="{{ route('admin.login') }}" class="text-indigo-600 hover:text-indigo-700">{{ route('admin.login') }}</a></p>
                    <p><strong>URL du dashboard :</strong> <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-700">{{ route('admin.dashboard') }}</a></p>
                    <p><strong>URL de debug admin :</strong> <a href="/debug/admin" class="text-indigo-600 hover:text-indigo-700">/debug/admin</a></p>
                    <p><strong>URL de création admin :</strong> <a href="/debug/create-admin" class="text-indigo-600 hover:text-indigo-700">/debug/create-admin</a></p>
                </div>
            </div>
            
            <!-- Quick Access Buttons -->
            <div class="grid grid-cols-2 gap-4 mb-8">
                <a href="{{ route('admin.login') }}" 
                   class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition-colors text-center font-medium">
                    📝 Page de Login Admin
                </a>
                <a href="/debug/admin" 
                   class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors text-center font-medium">
                    🔍 Debug Admin
                </a>
                <a href="/debug/create-admin" 
                   class="bg-orange-600 text-white px-6 py-3 rounded-lg hover:bg-orange-700 transition-colors text-center font-medium">
                    👤 Créer Admin
                </a>
                <a href="{{ route('admin.dashboard') }}" 
                   class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors text-center font-medium">
                    📊 Dashboard (protégé)
                </a>
            </div>
            
            <!-- Manual Login Form -->
            <div class="border-t pt-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Formulaire de test direct :</h3>
                <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="admin@shoestore.com" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <input type="password" name="password" value="admin123" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all">
                        🚀 Se connecter
                    </button>
                </form>
            </div>
            
            @if(session('error'))
                <div class="mt-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <strong>Erreur :</strong> {{ session('error') }}
                </div>
            @endif
            
            @if(session('success'))
                <div class="mt-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    <strong>Succès :</strong> {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
