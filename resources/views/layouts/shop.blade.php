<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Boutique de Chaussures') - ShoeStore</title>
    <!-- Tailwind CSS CDN for immediate loading -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }
        
        .hover-lift {
            transition: all 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .product-card {
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border-color: #667eea;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }
        
        .cart-badge {
            animation: pulse 2s infinite;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 200%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 backdrop-blur-lg bg-opacity-95">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-4xl font-bold  block text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-600 bg-gradient-to-r from-orange-500 to-red-600">
                        <span>ShoeStore</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors relative group">
                        Accueil
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-600 group-hover:w-full transition-all"></span>
                    </a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors relative group">
                        Produits
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-600 group-hover:w-full transition-all"></span>
                    </a>
                    <a href="{{ route('products.promotions') }}" class="text-red-600 hover:text-red-700 font-medium transition-colors relative group flex items-center animate-pulse">
                        <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                        </svg>
                        Promotions
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all"></span>
                    </a>
                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors relative group flex items-center">
                        <span class="mr-1">Panier</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span class="absolute -top-3 -right-3 bg-red-500 text-white text-xs rounded-full h-6 w-6 flex items-center justify-center cart-badge">
                            @php
                                $sessionId = session()->getId();
                                $cart = \App\Models\Cart::where('session_id', $sessionId)->first();
                                $cartCount = $cart ? $cart->total_items : 0;
                            @endphp
                            {{ $cartCount }}
                        </span>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-600 group-hover:w-full transition-all"></span>
                    </a>
                    <a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors relative group">
                        Contact
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-600 group-hover:w-full transition-all"></span>
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors relative group">
                        Admin
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-600 group-hover:w-full transition-all"></span>
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-gray-700 hover:text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Messages -->
    @if (session('success'))
        <div class="fixed top-20 right-4 z-50 fade-in max-w-md">
            <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg">
                <div class="flex items-center space-x-3 mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
                @if(session('submission_id'))
                <div class="bg-white/20 rounded-lg p-3 mt-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium">Numéro de soumission:</p>
                            <p class="text-xs font-bold">{{ session('submission_id') }}</p>
                        </div>
                        <a href="{{ route('contact.download-proof', session('submission_id')) }}" 
                           class="bg-white text-green-600 px-3 py-2 rounded-md text-sm font-semibold hover:bg-green-50 transition-colors flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Télécharger la preuve</span>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="fixed top-20 right-4 z-50 fade-in">
            <div class="bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Hero Section (full width) -->
    @if(request()->route()->getName() === 'products.index' || request()->route()->getName() === 'home')
        @yield('hero')
    @endif

    <!-- Main Content -->
    <main class="w-full w-auto">
        @yield('content')
    </main>

    <!-- Categories Section (full width) -->
    @if(request()->route()->getName() === 'home')
        @yield('categories')
    @endif

    <!-- CTA Section (full width) -->
    @if(request()->route()->getName() === 'home')
        @yield('cta')
    @endif

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-orange-500 to-red-600 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="text-2xl font-bold">ShoeStore</span>
                    </div>
                    <p class="text-white mb-4">
                        Votre boutique de chaussures en ligne avec paiement à la livraison. 
                        Découvrez notre collection de chaussures de qualité.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12.073C22 6.504 17.523 2 12 2S2 6.504 2 12.073c0 5.017 3.657 9.177 8.438 9.927v-7.03H7.898v-2.897h2.54V9.845c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562v1.876h2.773l-.443 2.897h-2.33V22C18.343 21.25 22 17.09 22 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <!-- WhatsApp Icon -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.52 3.48A11.82 11.82 0 0 0 12.04 0C5.5 0 .18 5.32.18 11.86c0 2.09.55 4.13 1.6 5.93L0 24l6.39-1.67a11.8 11.8 0 0 0 5.65 1.44h.01c6.54 0 11.86-5.32 11.86-11.86 0-3.17-1.23-6.15-3.39-8.43zm-8.48 18.3a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.79.99 1.01-3.69-.23-.38a9.9 9.9 0 0 1-1.52-5.25c0-5.46 4.45-9.91 9.92-9.91 2.65 0 5.13 1.03 6.99 2.9a9.82 9.82 0 0 1 2.91 7c0 5.46-4.45 9.91-9.89 9.91zm5.44-7.42c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.27-.47-2.42-1.5-.9-.8-1.5-1.8-1.68-2.1-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.08-.8.37-.27.3-1.05 1.02-1.05 2.48s1.08 2.88 1.23 3.08c.15.2 2.12 3.24 5.14 4.54.72.31 1.28.5 1.72.64.72.23 1.37.2 1.88.12.57-.08 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Liens rapides -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-white hover:text-gray-200 transition-colors">Accueil</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-white hover:text-gray-200 transition-colors">Produits</a></li>
                        <li><a href="{{ route('products.promotions') }}" class="text-white hover:text-gray-200 transition-colors">Promotions</a></li>
                        <li><a href="{{ route('cart.index') }}" class="text-white hover:text-gray-200 transition-colors">Panier</a></li>
                        <li><a href="{{ route('contact.index') }}" class="text-white hover:text-gray-200 transition-colors">Contact</a></li>
                        <li><a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-200 transition-colors">Admin</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-white">
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>contact@shoestore.com</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+33 1 23 45 67 89</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Paris, France</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-red-700 mt-8 pt-8 text-center">
                <p class="text-white">
                    &copy; {{ date('Y') }} ShoeStore. Tous droits réservés. | 
                    <a href="#" class="hover:text-gray-200 transition-colors">Mentions légales</a> | 
                    <a href="#" class="hover:text-gray-200 transition-colors">Politique de confidentialité</a>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
