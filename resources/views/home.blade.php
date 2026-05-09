@extends('layouts.shop')

@section('title', 'ShoeStore - Accueil')

@section('hero')
<!-- Hero Section with Background Image -->
<div class="relative h-[600px] w-full overflow-hidden mb-16">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://p0.piqsels.com/preview/206/873/135/gray-and-black-nike-air-jordan-1-s.jpg" 
             alt="Chaussures Premium" 
             class="w-full h-full object-cover">
        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
        <!-- Additional overlay for better text visibility -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
    </div>
    
    <!-- Content -->
    <div class="relative h-full flex items-center px-8 md:px-12 lg:px-20">
        <div class="max-w-4xl">
            <div class="mb-6">
                <span class="inline-block bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4 animate-pulse">
                    🔥 Collection 2024 - Jusqu'à -50%
                </span>
            </div>
            
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                Bienvenue chez
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-600 bg-gradient-to-r from-orange-500 to-red-600">
                    ShoeStore
                </span>
            </h1>
            
            <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-2xl leading-relaxed">
                Découvrez notre collection exclusive de chaussures de qualité supérieure. 
                Conçues pour le confort, le style et la performance.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <a href="{{ route('products.index') }}" 
                   class="inline-flex items-center justify-center bg-white text-gray-900 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Voir les produits
                </a>
                
                <a href="{{ route('products.promotions') }}" 
                   class="inline-flex items-center justify-center bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-red-600 transition-all transform hover:scale-105 shadow-lg animate-pulse">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    🔥 Promotions
                </a>
                
                <a href="{{ route('contact.index') }}" 
                   class="inline-flex items-center justify-center border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition-all transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact
                </a>
            </div>
            
            <!-- Stats -->
            <div class="flex flex-wrap gap-8 text-white">
                <div class="flex items-center space-x-3">
                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">4.9/5</div>
                        <div class="text-sm text-white/70">Avis clients</div>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">Livraison</div>
                        <div class="text-sm text-white/70">Gratuite dès 100€</div>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">Satisfait</div>
                        <div class="text-sm text-white/70">30 jours remboursé</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('content')
<!-- Featured Products Section -->
<div class="mb-16">
    <div class="text-center mb-8">
        <h2 class="text-5xl font-bold text-gray-900 mb-4">Produits Vedettes</h2>
        <p class="text-gray-600 text-2xl max-w-5xl mx-auto">
                Découvrez notre sélection des meilleures chaussures, choisies pour leur qualité et leur style
            </p>
        </div>
    
        <!-- Dynamic Statistics Section -->
    <div class="flex flex-wrap justify-center gap-8 mb-12 text-center">
        <div class="bg-white rounded-lg px-8 py-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <div class="text-5xl font-bold text-purple-600 mb-2">
                    <span class="counter" data-target="156">0</span>+
                </div>
            <div class="text-xl text-gray-600 font-medium">Produits disponibles</div>
            <div class="text-sm text-gray-500 mt-1">Toutes catégories confondues</div>
            </div>
        <div class="bg-white rounded-lg px-8 py-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <div class="text-5xl font-bold text-green-600 mb-2">
                    <span class="counter" data-target="35">0</span>%
                </div>
            <div class="text-xl text-gray-600 font-medium">Réduction moyenne</div>
            <div class="text-sm text-gray-500 mt-1">Sur toute la collection</div>
            </div>
        <div class="bg-white rounded-lg px-8 py-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <div class="text-5xl font-bold text-blue-600 mb-2">
                    <span class="counter" data-target="24">0</span>h
                </div>
            <div class="text-xl text-gray-600 font-medium">Livraison express</div>
            <div class="text-sm text-gray-500 mt-1">Sur tout le stock</div>
            </div>
        <div class="bg-white rounded-lg px-8 py-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <div class="text-5xl font-bold text-orange-600 mb-2">
                    <span class="counter" data-target="98">0</span>%
                </div>
            <div class="text-xl text-gray-600 font-medium">Satisfaction client</div>
            <div class="text-sm text-gray-500 mt-1">Basé sur 2500+ avis</div>
            </div>
        </div>
    
        <!-- JavaScript pour les compteurs animés -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const counters = document.querySelectorAll('.counter');
                const speed = 200;
                
                const animateCounter = (counter) => {
                    const target = +counter.getAttribute('data-target');
                    const increment = target / speed;
                    
                    const updateCount = () => {
                        const count = +counter.innerText;
                        
                        if(count < target) {
                            counter.innerText = Math.ceil(count + increment);
                            setTimeout(updateCount, 10);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    
                    updateCount();
                };
                
                // Observer pour déclencher l'animation quand visible
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if(entry.isIntersecting) {
                            animateCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                counters.forEach(counter => {
                    observer.observe(counter);
                });
            });
        </script>
    </div>
</div>

<!-- Featured Products Grid -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Product 1 -->
            <div class="group bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:scale-105 relative border border-gray-100">
                <!-- Product Image with Overlay -->
                <div class="relative overflow-hidden">
                    <img src="https://static.nike.com/a/images/w_1280,q_auto,f_auto/23e0aa53-3d2e-4ac6-aa66-91297d5618c2/date-de-sortie-de-la-air-jordan%C2%A04-toro-bravo-%C2%AB%C2%A0fire-red-and-black%C2%A0%C2%BB-fq8138-600.jpg" 
                         alt="Nike Air Max" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Badges -->
                    <div class="absolute top-4 left-4 flex flex-col gap-2">
                        <span class="bg-red-500 text-white px-4 py-2 rounded-full text-sm font-black shadow-lg text-center">
                            -25%
                        </span>
                        <span class="bg-yellow-400 text-gray-900 px-4 py-2 rounded-full text-sm font-black shadow-lg">
                            Bestseller
                        </span>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="bg-white/90 backdrop-blur-sm p-3 rounded-full shadow-lg hover:bg-white transition-all hover:scale-110">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="p-8">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="font-black text-xl text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">Nike Air Max 270</h3>
                            <p class="text-gray-600 text-base font-medium">Confort et style au quotidien</p>
                        </div>
                        <div class="ml-4">
                            <div class="flex items-center text-yellow-400 mb-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="ml-1 text-base font-black">4.8</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Price Section -->
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <div class="flex items-baseline">
                                <span class="text-3xl font-black text-gray-900">€112.50</span>
                                <span class="text-lg text-gray-400 line-through ml-3">€150.00</span>
                            </div>
                            <div class="text-green-600 text-base font-black mt-2">Économisez €37.50</div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="{{ route('products.index') }}" 
                           class="flex-1 bg-gradient-to-r from-orange-500 to-red-600 text-white text-center py-4 px-6 rounded-xl font-black hover:bg-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Voir détails
                        </a>
                    </div>
                </div>
            </div>
        
        <!-- Product 2 -->
        <div class="group bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:scale-105 relative border border-gray-100">
            <!-- Product Image with Overlay -->
            <div class="relative overflow-hidden">
                <img src="https://static.nike.com/a/images/t_web_pdp_535_v2/f_auto,u_9ddf04c7-2a9a-4d76-add1-d15af8f0263d,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/6a2093e8-f9c7-4b46-9946-49788011460f/AIR+FORCE+1+%2707+LX+VIBRAM.png" 
                     alt="Adidas Ultra Boost" 
                     class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <!-- Badges -->
                <div class="absolute top-4 left-4 flex flex-col gap-2">
                    <span class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-black shadow-lg">
                        Nouveau
                    </span>
                    <span class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-black shadow-lg">
                        Tendance
                    </span>
                </div>
                
                <!-- Quick Actions -->
                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="bg-white/90 backdrop-blur-sm p-3 rounded-full shadow-lg hover:bg-white transition-all hover:scale-110">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l5.318 5.318a4.5 4.5 0 006.364 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="p-8">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <h3 class="font-black text-xl text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">Adidas Ultra Boost</h3>
                        <p class="text-gray-600 text-base font-medium">Performance maximale garantie</p>
                    </div>
                    <div class="ml-4">
                        <div class="flex items-center text-yellow-400 mb-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-1 text-base font-black">4.9</span>
                        </div>
                    </div>
                </div>
                
                <!-- Price Section -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <div class="flex items-baseline">
                            <span class="text-3xl font-black text-gray-900">€180.00</span>
                        </div>
                        <div class="text-blue-600 text-base font-black mt-2">Nouveau prix</div>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('products.index') }}" 
                       class="flex-1 bg-gradient-to-r from-orange-500 to-red-600 text-white text-center py-4 px-6 rounded-xl font-black hover:bg-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Voir détails
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Product 3 -->
        <div class="group bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:scale-105 relative border border-gray-100">
            <!-- Product Image with Overlay -->
            <div class="relative overflow-hidden">
                <img src="https://static.nike.com/a/images/t_web_pdp_535_v2/f_auto,u_9ddf04c7-2a9a-4d76-add1-d15af8f0263d,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/961361f6-a7c0-4907-bc6e-bc891558fb35/NIKE+AIR+MAX+PLUS.png" 
                     alt="Puma RS-X" 
                     class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <!-- Badges -->
                <div class="absolute top-4 left-4 flex flex-col gap-2">
                    <span class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-black shadow-lg">
                        -30%
                    </span>
                    <span class="bg-purple-500 text-white px-4 py-2 rounded-full text-sm font-black shadow-lg">
                        Limité
                    </span>
                </div>
                
                <!-- Quick Actions -->
                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="bg-white/90 backdrop-blur-sm p-3 rounded-full shadow-lg hover:bg-white transition-all hover:scale-110">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636L5.318 5.318a4.5 4.5 0 006.364 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="p-8">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <h3 class="font-black text-xl text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">Puma RS-X³</h3>
                        <p class="text-gray-600 text-base font-medium">Design rétro et moderne</p>
                    </div>
                    <div class="ml-4">
                        <div class="flex items-center text-yellow-400 mb-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-1 text-base font-black">4.7</span>
                        </div>
                    </div>
                </div>
                
                <!-- Price Section -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <div class="flex items-baseline">
                            <span class="text-3xl font-black text-gray-900">€105.00</span>
                            <span class="text-lg text-gray-400 line-through ml-3">€150.00</span>
                        </div>
                        <div class="text-green-600 text-base font-black mt-2">Économisez €45.00</div>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('products.index') }}" 
                       class="flex-1 bg-gradient-to-r from-orange-500 to-red-600  text-white text-center py-4 px-6 rounded-xl font-black hover:bg-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Voir détails
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('cta')
<!-- Enhanced CTA Section -->
<div class="bg-gradient-to-r from-orange-500 to-red-600 py-16 text-center w-full">
    <div class="max-w-7xl mx-auto px-4">
        <div class="inline-block">
            <h3 class="text-5xl md:text-6xl font-black text-white mb-6 leading-tight">
                Découvrez toute notre collection
            </h3>
            <div class="w-32 h-1.5 bg-white mx-auto mb-8 rounded-full"></div>
        </div>
        <p class="text-2xl text-white mb-10 font-light max-w-4xl mx-auto">
            Plus de 50 modèles disponibles avec livraison gratuite dès 100€
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center bg-white text-orange-600 px-10 py-5 rounded-2xl font-black hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl text-lg">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Explorer tous les produits
            </a>
            <a href="{{ route('products.promotions') }}" 
               class="inline-flex items-center bg-white text-orange-600 px-10 py-5 rounded-2xl font-black hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl text-lg animate-pulse">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Offres spéciales
            </a>
        </div>
    </div>
</div>

<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-block">
                <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-6 leading-tight">
                    Catégories de produits
                </h2>
                <div class="w-32 h-1.5 bg-gradient-to-r from-orange-500 to-red-600 mx-auto mb-8 rounded-full"></div>
            </div>
            <p class="text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed font-light">
                Explorez notre collection complète organisée par catégories pour trouver exactement ce dont vous avez besoin
            </p>
        </div>
        
        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Running Category -->
            <a href="{{ route('products.index', ['category' => 'running']) }}" 
               class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 overflow-hidden border border-gray-100">
                <div class="p-10 text-center">
                    <!-- Icon -->
                    <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:from-blue-600 group-hover:to-blue-700 transition-all duration-300 shadow-lg">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        Running
                    </h3>
                    <p class="text-gray-600 text-base font-medium mb-6 leading-relaxed">
                        Performance et confort pour vos courses
                    </p>
                    
                    <!-- Stats -->
                    <div class="text-base text-gray-500 mb-6 font-medium">
                        <span class="font-black text-blue-600 text-lg">25+</span> modèles disponibles
                    </div>
                    
                    <!-- Arrow -->
                    <div class="flex items-center justify-center text-blue-600 group-hover:text-blue-700 transition-colors">
                        <span class="text-base font-black mr-3">Explorer</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </a>
            
            <!-- Basketball Category -->
            <a href="{{ route('products.index', ['category' => 'basketball']) }}" 
               class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 overflow-hidden border border-gray-100">
                <div class="p-10 text-center">
                    <!-- Icon -->
                    <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center group-hover:from-orange-600 group-hover:to-red-700 transition-all duration-300 shadow-lg">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-orange-600 transition-colors">
                        Basketball
                    </h3>
                    <p class="text-gray-600 text-base font-medium mb-6 leading-relaxed">
                        Dominquez le terrain avec style
                    </p>
                    
                    <!-- Stats -->
                    <div class="text-base text-gray-500 mb-6 font-medium">
                        <span class="font-black text-orange-600 text-lg">18+</span> modèles disponibles
                    </div>
                    
                    <!-- Arrow -->
                    <div class="flex items-center justify-center text-orange-600 group-hover:text-orange-700 transition-colors">
                        <span class="text-base font-black mr-3">Explorer</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </a>
            
            <!-- Lifestyle Category -->
            <a href="{{ route('products.index', ['category' => 'lifestyle']) }}" 
               class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 overflow-hidden border border-gray-100">
                <div class="p-10 text-center">
                    <!-- Icon -->
                    <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center group-hover:from-purple-600 group-hover:to-pink-700 transition-all duration-300 shadow-lg">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">
                        Lifestyle
                    </h3>
                    <p class="text-gray-600 text-base font-medium mb-6 leading-relaxed">
                        Style au quotidien pour toutes occasions
                    </p>
                    
                    <!-- Stats -->
                    <div class="text-base text-gray-500 mb-6 font-medium">
                        <span class="font-black text-purple-600 text-lg">30+</span> modèles disponibles
                    </div>
                    
                    <!-- Arrow -->
                    <div class="flex items-center justify-center text-purple-600 group-hover:text-purple-700 transition-colors">
                        <span class="text-base font-black mr-3">Explorer</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </a>
            
            <!-- Training Category -->
            <a href="{{ route('products.index', ['category' => 'training']) }}" 
               class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 overflow-hidden border border-gray-100">
                <div class="p-10 text-center">
                    <!-- Icon -->
                    <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center group-hover:from-green-600 group-hover:to-teal-700 transition-all duration-300 shadow-lg">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-green-600 transition-colors">
                        Training
                    </h3>
                    <p class="text-gray-600 text-base font-medium mb-6 leading-relaxed">
                        Performance optimale pour vos entraînements
                    </p>
                    
                    <!-- Stats -->
                    <div class="text-base text-gray-500 mb-6 font-medium">
                        <span class="font-black text-green-600 text-lg">22+</span> modèles disponibles
                    </div>
                    
                    <!-- Arrow -->
                    <div class="flex items-center justify-center text-green-600 group-hover:text-green-700 transition-colors">
                        <span class="text-base font-black mr-3">Explorer</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Bottom CTA -->
        <div class="text-center mt-16">
            <p class="text-xl text-gray-600 mb-6 font-medium">
                Vous ne trouvez pas ce que vous cherchez ?
            </p>
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center bg-gradient-to-r from-orange-500 to-red-600 text-white px-10 py-5 rounded-2xl font-black hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl text-lg">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                Voir tous les produits
            </a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<div class="bg-gradient-to-r from-orange-500 to-red-600 py-20 text-center text-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="inline-block">
            <h2 class="text-5xl md:text-6xl font-black text-white mb-6 leading-tight">
                Prêt à trouver la paire parfaite ?
            </h2>
            <div class="w-32 h-1.5 bg-white mx-auto mb-8 rounded-full"></div>
        </div>
        <p class="text-2xl text-white mb-10 font-light max-w-4xl mx-auto">
            Explorez notre collection et profitez des meilleures offres
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('products.index') }}" class="bg-white text-orange-600 px-10 py-5 rounded-2xl font-black hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl text-lg">
                Commencer mes achats
            </a>
            <a href="{{ route('contact.index') }}" class="border-4 border-white text-white px-10 py-5 rounded-2xl font-black hover:bg-white hover:text-purple-600 transition-all duration-300 transform hover:scale-105 text-lg">
                Nous contacter
            </a>
        </div>
    </div>
</div>

<!-- Avantages & Services Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-block">
                <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-6 leading-tight">
                    Avantages & Services
                </h2>
                <div class="w-32 h-1.5 bg-gradient-to-r from-orange-500 to-red-600 mx-auto mb-8 rounded-full"></div>
            </div>
            <p class="text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed font-light">
                Découvrez tous les avantages de faire vos achats chez ShoeStore
            </p>
        </div>
        
        <!-- Advantages Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Livraison gratuite -->
            <div class="text-center group">
                <div class="w-28 h-28 mx-auto mb-6 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition-all duration-300 shadow-lg">
                    <svg class="w-14 h-14 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-3">Livraison gratuite</h3>
                <p class="text-gray-600 text-lg font-medium">Livraison gratuite dès 100€ d'achat</p>
            </div>
            
            <!-- Retour facile -->
            <div class="text-center group">
                <div class="w-28 h-28 mx-auto mb-6 bg-green-100 rounded-2xl flex items-center justify-center group-hover:bg-green-200 transition-all duration-300 shadow-lg">
                    <svg class="w-14 h-14 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-3">Retour facile</h3>
                <p class="text-gray-600 text-lg font-medium">Retours sous 30 jours sans frais</p>
            </div>
            
            <!-- Paiement sécurisé -->
            <div class="text-center group">
                <div class="w-28 h-28 mx-auto mb-6 bg-purple-100 rounded-2xl flex items-center justify-center group-hover:bg-purple-200 transition-all duration-300 shadow-lg">
                    <svg class="w-14 h-14 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-3">Paiement sécurisé</h3>
                <p class="text-gray-600 text-lg font-medium">Paiement 100% sécurisé et crypté</p>
            </div>
            
            <!-- Support 7j/7 -->
            <div class="text-center group">
                <div class="w-28 h-28 mx-auto mb-6 bg-orange-100 rounded-2xl flex items-center justify-center group-hover:bg-orange-200 transition-all duration-300 shadow-lg">
                    <svg class="w-14 h-14 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-3">Support 7j/7</h3>
                <p class="text-gray-600 text-lg font-medium">Service client disponible 7 jours/7</p>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter & Réseaux sociaux Section -->
<section class="py-16 bg-gradient-to-r from-orange-500 to-red-600">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Newsletter Section -->
                <div class="text-white">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">
                        Restez connecté !
                    </h2>
                    <p class="text-lg mb-6 text-white/90">
                        Inscrivez-vous à notre newsletter pour recevoir les dernières nouveautés, 
                        offres exclusives et conseils mode directement dans votre boîte mail.
                    </p>
                    
                    <!-- Newsletter Form -->
                    <form class="space-y-4" onsubmit="handleNewsletterSubmit(event)">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <input 
                                type="email" 
                                placeholder="Votre adresse email" 
                                required
                                class="flex-1 px-4 py-3 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50"
                            >
                            <button 
                                type="submit"
                                class="bg-white text-orange-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg"
                            >
                                S'inscrire
                            </button>
                        </div>
                        <p class="text-sm text-white/70">
                            En vous inscrivant, vous acceptez de recevoir nos emails. 
                            <a href="#" class="underline hover:text-white">Politique de confidentialité</a>
                        </p>
                    </form>
                    
                    <!-- Success Message -->
                    <div id="newsletter-success" class="hidden mt-4 p-4 bg-green-500 text-white rounded-lg">
                        Merci pour votre inscription ! 🎉
                    </div>
                </div>
                
                <!-- Réseaux sociaux Section -->
                <div class="text-center lg:text-right text-white">
                    <h3 class="text-2xl font-bold mb-6">
                        Suivez-nous sur les réseaux sociaux
                    </h3>
                    <p class="text-lg mb-8 text-white/90">
                        Rejoignez notre communauté et ne manquez aucune actualité !
                    </p>
                    
                    <!-- Social Icons Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-md mx-auto lg:ml-auto">
                        <!-- Facebook -->
                        <a href="https://facebook.com/shoestore" target="_blank" rel="noopener" 
                           class="group bg-white/10 backdrop-blur-sm p-4 rounded-xl hover:bg-white hover:text-orange-600 transition-all duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span class="text-xs mt-2 block">Facebook</span>
                        </a>
                        
                        <!-- Instagram -->
                        <a href="https://instagram.com/shoestore" target="_blank" rel="noopener"
                           class="group bg-white/10 backdrop-blur-sm p-4 rounded-xl hover:bg-white hover:text-orange-600 transition-all duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/>
                            </svg>
                            <span class="text-xs mt-2 block">Instagram</span>
                        </a>
                        
                        <!-- Twitter -->
                        <a href="https://twitter.com/shoestore" target="_blank" rel="noopener"
                           class="group bg-white/10 backdrop-blur-sm p-4 rounded-xl hover:bg-white hover:text-orange-600 transition-all duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            <span class="text-xs mt-2 block">Twitter</span>
                        </a>
                        
                        <!-- YouTube -->
                        <a href="https://youtube.com/shoestore" target="_blank" rel="noopener"
                           class="group bg-white/10 backdrop-blur-sm p-4 rounded-xl hover:bg-white hover:text-orange-600 transition-all duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            <span class="text-xs mt-2 block">YouTube</span>
                        </a>
                    </div>
                    
                    <!-- Additional Social Info -->
                    <div class="mt-8 text-white/80">
                        <p class="text-sm">
                            <span class="font-semibold">#ShoeStore</span> - 
                            Partagez votre style avec 
                            <span class="font-semibold">@shoestore</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Témoignages Clients Section -->
<section class="py-24">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-block">
                <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-6 leading-tight">
                    Ce que nos clients disent
                </h2>
                <div class="w-32 h-1.5 bg-gradient-to-r from-orange-500 to-red-600 mx-auto mb-8 rounded-full"></div>
            </div>
            <p class="text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed font-light">
                Découvrez les témoignages de nos clients satisfaits et leur expérience avec ShoeStore
            </p>
        </div>
        
        <!-- Témoignages Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Témoignage 1 -->
            <div class="bg-white rounded-2xl shadow-xl p-10 hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                <!-- Rating Stars -->
                <div class="flex items-center mb-6">
                    <div class="flex text-yellow-400">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <span class="ml-3 text-lg text-gray-600 font-black">5.0/5</span>
                </div>
                
                <!-- Témoignage Text -->
                <blockquote class="text-gray-700 mb-8 italic text-lg leading-relaxed font-medium">
                    "Service exceptionnel ! Les chaussures sont de qualité supérieure et la livraison a été ultra-rapide. 
                    Je suis maintenant client fidèle et je recommande vivement ShoeStore à tous mes amis."
                </blockquote>
                
                <!-- Client Info -->
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face&auto=format" 
                         alt="Marie Dubois" 
                         class="w-16 h-16 rounded-full object-cover mr-4 border-4 border-orange-100">
                    <div>
                        <div class="font-black text-xl text-gray-900 mb-1">Marie Dubois</div>
                        <div class="text-base text-gray-600 font-medium">Vérifié • Acheté Nike Air Max</div>
                    </div>
                </div>
            </div>
            
            <!-- Témoignage 2 -->
            <div class="bg-white rounded-2xl shadow-xl p-10 hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                <!-- Rating Stars -->
                <div class="flex items-center mb-6">
                    <div class="flex text-yellow-400">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <span class="ml-3 text-lg text-gray-600 font-black">5.0/5</span>
                </div>
                
                <!-- Témoignage Text -->
                <blockquote class="text-gray-700 mb-8 italic text-lg leading-relaxed font-medium">
                    "Le site est très facile à naviguer et les promotions sont incroyables ! 
                    J'ai pu trouver des chaussures de qualité à prix réduit. Le service client est également très réactif."
                </blockquote>
                
                <!-- Client Info -->
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face&auto=format" 
                         alt="Thomas Martin" 
                         class="w-16 h-16 rounded-full object-cover mr-4 border-4 border-blue-100">
                    <div>
                        <div class="font-black text-xl text-gray-900 mb-1">Thomas Martin</div>
                        <div class="text-base text-gray-600 font-medium">Vérifié • Acheté Adidas Ultra Boost</div>
                    </div>
                </div>
            </div>
            
            <!-- Témoignage 3 -->
            <div class="bg-white rounded-2xl shadow-xl p-10 hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                <!-- Rating Stars -->
                <div class="flex items-center mb-6">
                    <div class="flex text-yellow-400">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6 text-gray-300" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <span class="ml-3 text-lg text-gray-600 font-black">4.0/5</span>
                </div>
                
                <!-- Témoignage Text -->
                <blockquote class="text-gray-700 mb-8 italic text-lg leading-relaxed font-medium">
                    "Excellente expérience d'achat ! Les chaussures correspondent parfaitement à la description 
                    et la taille est bien indiquée. Je suis très satisfait de mon achat et recommande ce site."
                </blockquote>
                
                <!-- Client Info -->
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face&auto=format" 
                         alt="Sophie Lefebvre" 
                         class="w-16 h-16 rounded-full object-cover mr-4 border-4 border-purple-100">
                    <div>
                        <div class="font-black text-xl text-gray-900 mb-1">Sophie Lefebvre</div>
                        <div class="text-base text-gray-600 font-medium">Vérifié • Acheté Puma RS-X³</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom CTA for témoignages -->
        <div class="text-center mt-20">
            <p class="text-2xl text-gray-600 mb-8 font-medium">
                Vous avez aimé votre expérience ? 
            </p>
            <a href="{{ route('contact.index') }}" 
               class="inline-flex items-center bg-gradient-to-r from-orange-500 to-red-600 text-white px-12 py-6 rounded-2xl font-black hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl text-lg">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Partager votre témoignage
            </a>
        </div>
    </div>
</section>

<!-- JavaScript pour la newsletter -->
<script>
    function handleNewsletterSubmit(event) {
        event.preventDefault();
        
        const email = event.target.querySelector('input[type="email"]').value;
        const successMessage = document.getElementById('newsletter-success');
        const form = event.target;
        
        // Simulation d'envoi (à remplacer par un vrai appel API)
        setTimeout(() => {
            // Afficher le message de succès
            successMessage.classList.remove('hidden');
            
            // Réinitialiser le formulaire
            form.reset();
            
            // Masquer le message après 5 secondes
            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 5000);
            
            console.log('Newsletter inscription:', email);
        }, 500);
    }
</script>

@endsection
