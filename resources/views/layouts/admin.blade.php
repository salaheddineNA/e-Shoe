<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - ShoeStore')</title>
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
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        
        .nav-link {
            position: relative;
            transition: all 0.2s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <!-- Logo -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2a2 2 0 00-2 2v1.09a7.002 7.002 0 00-4.91 4.91H4a2 2 0 000 4h1.09a7.002 7.002 0 004.91 4.91V20a2 2 0 004 0v-1.09a7.002 7.002 0 004.91-4.91H20a2 2 0 000-4h-1.09a7.002 7.002 0 00-4.91-4.91V4a2 2 0 00-2-2zm0 6a4 4 0 110 8 4 4 0 010-8z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">ShoeStore</span>
                            <span class="text-xs text-gray-500 font-medium">ADMIN</span>
                        </div>
                    </a>
                    
                    <!-- Navigation Links -->
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                            Tableau de bord
                        </a>
                        
                        @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_products') || Auth::guard('admin')->user()->isSuperAdmin()))
                            <a href="{{ route('admin.products') }}" class="nav-link text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                Produits
                            </a>
                        @endif
                        
                        @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_orders') || Auth::guard('admin')->user()->isSuperAdmin()))
                            <a href="{{ route('admin.orders') }}" class="nav-link text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                Commandes
                            </a>
                        @endif
                        
                        @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_contacts') || Auth::guard('admin')->user()->isSuperAdmin()))
                            <a href="{{ route('admin.contact-messages') }}" class="nav-link text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                Messages
                            </a>
                        @endif
                        
                        @if(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasPermission('manage_admins') || Auth::guard('admin')->user()->isSuperAdmin()))
                            <a href="{{ route('admin.admins.index') }}" class="nav-link text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                Administrateurs
                            </a>
                        @endif
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Store Link -->
                    <a href="{{ route('home') }}" 
                       class="hidden sm:flex items-center space-x-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:shadow-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Voir la boutique</span>
                    </a>
                    
                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    
                    <!-- User Menu -->
                    <div class="flex items-center space-x-3 pl-4 border-l border-gray-200">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-gray-900">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-500">Administrateur</p>
                        </div>
                        <div class="relative group">
                            <button class="w-10 h-10 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center hover:shadow-lg transition-all">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="py-2">
                                    <div class="px-4 py-2 border-b border-gray-100">
                                        <p class="text-sm font-medium text-gray-900">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                                        <p class="text-xs text-gray-500">Administrateur</p>
                                    </div>
                                    <a href="{{ route('admin.profile') }}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-md transition-colors flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>Mon profil</span>
                                    </a>
                                    <form action="{{ route('admin.logout') }}" method="POST" class="px-2 py-1">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-md transition-colors flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-6">
        @yield('content')
    </main>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed bottom-6 right-6 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl shadow-2xl fade-in z-50 flex items-center space-x-3">
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed bottom-6 right-6 bg-gradient-to-r from-red-500 to-pink-600 text-white px-6 py-4 rounded-xl shadow-2xl fade-in z-50 flex items-center space-x-3">
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif
</body>
</html>
