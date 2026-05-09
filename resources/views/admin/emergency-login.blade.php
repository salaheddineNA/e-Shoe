<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Mode d'Urgence</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-red-50 via-white to-orange-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 p-4">
        <!-- Header -->
        <div class="text-center">
            <div class="mx-auto w-20 h-20 bg-gradient-to-br from-red-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-xl mb-6">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16a1 1 0 11-2 0V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">🚨 CONNEXION ADMIN</h1>
            <p class="text-red-600 font-semibold">Mode d'Urgence - Solution Garantie</p>
        </div>

        <!-- Alert -->
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
            <p class="font-bold">⚠️ Mode d'urgence activé</p>
            <p class="text-sm">Cette connexion contourne tous les problèmes potentiels</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <form action="/emergency-admin/login" method="POST" class="space-y-6">
                @csrf
                
                <!-- Instructions -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-900 mb-2">Instructions :</h3>
                    <ol class="list-decimal list-inside space-y-1 text-sm text-gray-700">
                        <li>Cliquez simplement sur "Connexion Immédiate"</li>
                        <li>Le système va créer/recréer l'admin automatiquement</li>
                        <li>Vous serez connecté automatiquement</li>
                    </ol>
                </div>

                <!-- Credentials Display -->
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-blue-900 mb-2">Identifiants (pour info) :</h3>
                    <div class="space-y-1 text-sm">
                        <p><strong>Email:</strong> admin@shoestore.com</p>
                        <p><strong>Mot de passe:</strong> admin123</p>
                    </div>
                </div>

                <!-- Quick Login Button -->
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-red-600 to-orange-600 text-white px-6 py-4 rounded-lg hover:from-red-700 hover:to-orange-700 transition-all text-lg font-bold shadow-lg transform hover:scale-105">
                    🚀 CONNEXION IMMÉDIATE
                </button>

                <!-- Alternative Links -->
                <div class="space-y-2 pt-4 border-t">
                    <a href="/debug/admin" class="block w-full bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors text-center">
                        🔍 Vérifier l'admin en base
                    </a>
                    <a href="/debug/create-admin" class="block w-full bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors text-center">
                        👤 Créer l'admin manuellement
                    </a>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center">
            <p class="text-sm text-gray-500">
                <a href="/" class="text-red-600 hover:text-red-700 font-medium transition-colors">
                    ← Retour à la boutique
                </a>
            </p>
        </div>
    </div>
</body>
</html>
