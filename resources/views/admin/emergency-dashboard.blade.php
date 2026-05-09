<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Mode d'Urgence</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-orange-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold">🚨 DASHBOARD ADMIN - MODE D'URGENCE</h1>
                    <p class="text-red-100">Connexion réussie ! Accès administrateur actif</p>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="bg-white/20 px-3 py-1 rounded-full text-sm">
                        👤 {{ $admin->name }}
                    </span>
                    <a href="/emergency-admin/logout" 
                       class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg transition-colors">
                        🚪 Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4">
        <div class="max-w-7xl mx-auto">
            <p class="font-bold">✅ CONNEXION ADMIN RÉUSSIE !</p>
            <p>Vous êtes maintenant connecté au panneau d'administration en mode d'urgence.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Admin Info -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">📋 Informations de Connexion</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600">ID Admin</p>
                    <p class="text-lg font-semibold">{{ $admin->id }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="text-lg font-semibold">{{ $admin->email }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600">Statut</p>
                    <p class="text-lg font-semibold text-green-600">{{ $admin->status }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <a href="/admin/products" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all hover:scale-105">
                <div class="text-center">
                    <div class="text-4xl mb-3">📦</div>
                    <h3 class="font-bold text-gray-900">Produits</h3>
                    <p class="text-gray-600 text-sm">Gérer les produits</p>
                </div>
            </a>

            <a href="/admin/orders" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all hover:scale-105">
                <div class="text-center">
                    <div class="text-4xl mb-3">📋</div>
                    <h3 class="font-bold text-gray-900">Commandes</h3>
                    <p class="text-gray-600 text-sm">Gérer les commandes</p>
                </div>
            </a>

            <a href="/admin/contact-messages" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all hover:scale-105">
                <div class="text-center">
                    <div class="text-4xl mb-3">💬</div>
                    <h3 class="font-bold text-gray-900">Messages</h3>
                    <p class="text-gray-600 text-sm">Messages de contact</p>
                </div>
            </a>

            <a href="/admin/admins" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all hover:scale-105">
                <div class="text-center">
                    <div class="text-4xl mb-3">👥</div>
                    <h3 class="font-bold text-gray-900">Admins</h3>
                    <p class="text-gray-600 text-sm">Gérer les admins</p>
                </div>
            </a>
        </div>

        <!-- Navigation Options -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">🧭 Navigation</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="/admin" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors text-center">
                    🎯 Dashboard Original
                </a>
                <a href="/simple-admin" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors text-center">
                    🔧 Dashboard Simplifié
                </a>
                <a href="/" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition-colors text-center">
                    🏪 Retour Boutique
                </a>
                <a href="/test-admin-login" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors text-center">
                    🧪 Page de Test
                </a>
            </div>
        </div>

        <!-- Debug Info -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
            <h2 class="text-xl font-bold text-yellow-900 mb-4">🔍 Informations de Debug</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <p><strong>Mode :</strong> <span class="text-red-600 font-bold">URGENCE</span></p>
                    <p><strong>Admin connecté :</strong> <span class="text-green-600">✅ Oui</span></p>
                    <p><strong>Guard utilisé :</strong> admin</p>
                </div>
                <div>
                    <p><strong>Session ID :</strong> {{ session()->getId() }}</p>
                    <p><strong>Méthode :</strong> Connexion forcée</p>
                    <p><strong>Statut :</strong> Actif et fonctionnel</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
