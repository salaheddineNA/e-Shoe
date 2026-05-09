@extends('layouts.shop')

@section('title', 'Contact - ShoeStore')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-orange-500 to-red-600 overflow-hidden mb-16">
    <div class="absolute inset-0  opacity-20"></div>
    <div class="relative px-8 py-16 md:px-12 lg:px-20">
        <div class="max-w-4xl mx-auto text-center text-white">
            <div class="flex items-center justify-center mb-4">
                <svg class="w-12 h-12 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Contactez-nous
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-white/90">
                Notre équipe est là pour répondre à toutes vos questions
            </p>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Envoyez-nous un message</h2>
            
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nom complet *
                        </label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Jean Dupont">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email *
                        </label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="jean@example.com">
                    </div>
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        Téléphone
                    </label>
                    <input type="tel" id="phone" name="phone"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="06 12 34 56 78">
                </div>
                
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                        Sujet *
                    </label>
                    <select id="subject" name="subject" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Choisissez un sujet</option>
                        <option value="question">Question sur un produit</option>
                        <option value="order">Suivi de commande</option>
                        <option value="return">Retour ou échange</option>
                        <option value="technical">Problème technique</option>
                        <option value="partnership">Partenariat</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                        Message *
                    </label>
                    <textarea id="message" name="message" rows="6" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Décrivez votre demande en détail..."></textarea>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="newsletter" name="newsletter" value="1"
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="newsletter" class="ml-2 text-sm text-gray-600">
                        Je souhaite recevoir la newsletter et les offres promotionnelles
                    </label>
                </div>
                
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-orange-500 to-red-600 text-white py-4 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors transform hover:scale-105">
                    Envoyer le message
                </button>
            </form>
        </div>
        
        <!-- Contact Information -->
        <div class="space-y-8">
            <!-- Contact Info -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Nos coordonnées</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Adresse</h3>
                            <p class="text-gray-600">123 Avenue des Champs-Élysées<br>75008 Paris, France</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Téléphone</h3>
                            <p class="text-gray-600">+33 1 23 45 67 89<br>Lun-Ven: 9h-18h, Sam: 10h-16h</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                            <p class="text-gray-600">contact@shoestore.fr<br>support@shoestore.fr</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Opening Hours -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Horaires d'ouverture</h2>
                
                <div class="space-y-3">
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">Lundi - Vendredi</span>
                        <span class="font-medium text-gray-900">9h00 - 18h00</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">Samedi</span>
                        <span class="font-medium text-gray-900">10h00 - 16h00</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-600">Dimanche & Fériés</span>
                        <span class="font-medium text-red-600">Fermé</span>
                    </div>
                </div>
            </div>
            
            <!-- Social Media -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Suivez-nous</h2>
                
                <div class="flex space-x-4">
                    <a href="#" class="bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-pink-600 text-white p-3 rounded-lg hover:bg-pink-700 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 1.5h8.5c2.347 0 4.25 1.903 4.25 4.25v8.5c0 2.347-1.903 4.25-4.25 4.25h-8.5C5.403 20.5 3.5 18.597 3.5 16.25v-8.5C3.5 5.403 5.403 3.5 7.75 3.5zm8.875 1.125a.875.875 0 100 1.75.875.875 0 000-1.75zM12 7a5 5 0 100 10 5 5 0 000-10zm0 1.5A3.5 3.5 0 1112 15.5 3.5 3.5 0 0112 8.5z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-black text-white p-3 rounded-lg hover:bg-gray-800 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                </div>
                
                <p class="text-gray-600 mt-4">
                    Rejoignez notre communauté pour ne manquer aucune actualité et offre exclusive !
                </p>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="mt-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Questions fréquentes</h2>
            <p class="text-gray-600 text-lg">Trouvez rapidement les réponses à vos questions</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Livraison</h3>
                </div>
                <p class="text-gray-600">La livraison est gratuite dès 100€ d'achat. Sinon, les frais de livraison sont de 5,90€.</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Retours</h3>
                </div>
                <p class="text-gray-600">Vous avez 30 jours pour retourner un article. Le produit doit être non porté et dans son emballage d'origine.</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Délai de livraison</h3>
                </div>
                <p class="text-gray-600">La livraison standard prend 3-5 jours ouvrés. Express : 24-48h pour Paris et grandes villes.</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-orange-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Paiement</h3>
                </div>
                <p class="text-gray-600">Carte bancaire, PayPal, Apple Pay, Google Pay. Paiement sécurisé en 3x sans frais dès 100€.</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-red-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Satisfait ou remboursé</h3>
                </div>
                <p class="text-gray-600">Si vous n'êtes pas satisfait, nous vous remboursons sans frais sous 14 jours.</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-indigo-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Service client</h3>
                </div>
                <p class="text-gray-600">Notre équipe est disponible du lundi au vendredi de 9h à 18h pour vous aider.</p>
            </div>
        </div>
    </div>
</div>
@endsection
