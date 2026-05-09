@extends('layouts.admin')

@section('title', 'Ajouter un produit - ShoeStore Admin')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Ajouter un produit</h1>
        <p class="text-gray-600">Créez une nouvelle paire de chaussures pour votre boutique</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8" onsubmit="return validateForm()">
            @csrf
            
            <!-- Basic Information -->
            <div class="bg-gray-50 px-8 py-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Informations générales
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nom du produit <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                               placeholder="Ex: Nike Air Max 90" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug <span class="text-gray-400">(optionnel)</span>
                        </label>
                        <input type="text" id="slug" name="slug"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                               placeholder="ex: nike-air-max-90" value="{{ old('slug') }}">
                        <p class="text-xs text-gray-500 mt-1">URL unique pour le produit (généré automatiquement si vide)</p>
                        @error('slug')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Brand -->
                    <div>
                        <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">
                            Marque <span class="text-red-500">*</span>
                        </label>
                        <select id="brand" name="brand" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                            <option value="">Sélectionner une marque</option>
                            <option value="Nike" {{ old('brand') == 'Nike' ? 'selected' : '' }}>Nike</option>
                            <option value="Adidas" {{ old('brand') == 'Adidas' ? 'selected' : '' }}>Adidas</option>
                            <option value="Puma" {{ old('brand') == 'Puma' ? 'selected' : '' }}>Puma</option>
                            <option value="New Balance" {{ old('brand') == 'New Balance' ? 'selected' : '' }}>New Balance</option>
                            <option value="Converse" {{ old('brand') == 'Converse' ? 'selected' : '' }}>Converse</option>
                            <option value="Vans" {{ old('brand') == 'Vans' ? 'selected' : '' }}>Vans</option>
                            <option value="Reebok" {{ old('brand') == 'Reebok' ? 'selected' : '' }}>Reebok</option>
                            <option value="Autre" {{ old('brand') == 'Autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('brand')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Prix (€) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="price" name="price" required step="0.01" min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                               placeholder="129.99" value="{{ old('price') }}">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Colors Selection -->
            <div class="px-8 py-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                    Couleurs disponibles
                    <span class="text-sm text-gray-500 ml-2">(Sélection multiple possible)</span>
                </h2>
                
                <div class="space-y-4">
                    <!-- Color Options -->
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        <!-- Black -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Noir" class="sr-only peer" {{ request()->old('colors') ? (is_array(request()->old('colors')) && in_array('Noir', request()->old('colors')) ? 'checked' : '') : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-black rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Noir</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- White -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Blanc" class="sr-only peer" {{ in_array('Blanc', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-white border border-gray-300 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Blanc</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Red -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Rouge" class="sr-only peer" {{ in_array('Rouge', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-red-500 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Rouge</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Blue -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Bleu" class="sr-only peer" {{ in_array('Bleu', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-blue-500 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Bleu</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Green -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Vert" class="sr-only peer" {{ in_array('Vert', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-green-500 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Vert</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Yellow -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Jaune" class="sr-only peer" {{ in_array('Jaune', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-yellow-400 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Jaune</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Purple -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Violet" class="sr-only peer" {{ in_array('Violet', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-purple-500 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Violet</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Orange -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Orange" class="sr-only peer" {{ in_array('Orange', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-orange-500 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Orange</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Pink -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Rose" class="sr-only peer" {{ in_array('Rose', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-pink-400 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Rose</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Gray -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Gris" class="sr-only peer" {{ in_array('Gris', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-gray-500 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Gris</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Brown -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Marron" class="sr-only peer" {{ in_array('Marron', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-amber-700 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Marron</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Navy -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Marine" class="sr-only peer" {{ in_array('Marine', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-blue-900 rounded-lg shadow-inner"></div>
                                    <span class="text-sm font-medium text-gray-700">Marine</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Custom Color -->
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="colors[]" value="Personnalisé" class="sr-only peer" {{ in_array('Personnalisé', old('colors', [])) ? 'checked' : '' }}>
                            <div class="relative p-4 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all hover:border-gray-300">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-lg shadow-inner flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700">Autre</span>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- All Colors Option -->
                    <div class="mt-4 p-4 bg-indigo-50 border border-indigo-200 rounded-lg">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="all_colors" value="1" class="mr-3 h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" {{ request()->old('all_colors') == '1' ? 'checked' : '' }}>
                            <span class="text-sm font-medium text-indigo-900">
                                Disponible dans toutes les couleurs
                            </span>
                        </label>
                        <p class="text-xs text-indigo-700 mt-2 ml-7">
                            Cochez cette option si le produit est disponible dans toutes les couleurs ci-dessus
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sizes & Stock -->
            <div class="px-8 py-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    Pointures et Stock
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Sizes -->
                    <div>
                        <label for="size" class="block text-sm font-medium text-gray-700 mb-2">
                            Pointures disponibles <span class="text-red-500">*</span>
                        </label>
                        
                        <!-- Size Options Grid -->
                        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 mb-4">
                            <!-- 36 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="36" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('36', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">36</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 37 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="37" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('37', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">37</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 38 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="38" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('38', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">38</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 39 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="39" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('39', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">39</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 40 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="40" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('40', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">40</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 41 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="41" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('41', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">41</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 42 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="42" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('42', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">42</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 43 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="43" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('43', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">43</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 44 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="44" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('44', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">44</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 45 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="45" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('45', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">45</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- 46 -->
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="size[]" value="46" class="sr-only peer" {{ request()->old('size') ? (is_array(request()->old('size')) && in_array('46', request()->old('size')) ? 'checked' : '') : '' }}>
                                <div class="relative p-3 border-2 border-gray-200 rounded-lg peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 transition-all hover:border-gray-300 text-center">
                                    <span class="text-sm font-medium">46</span>
                                    <div class="absolute top-1 right-1 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Quick Selection Buttons -->
                        <div class="flex flex-wrap gap-2 mb-3">
                            <button type="button" onclick="selectAllSizes()" class="px-3 py-1 text-xs bg-indigo-100 text-indigo-700 rounded-md hover:bg-indigo-200 transition-colors">
                                Sélectionner toutes
                            </button>
                            <button type="button" onclick="deselectAllSizes()" class="px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                                Désélectionner toutes
                            </button>
                            <button type="button" onclick="selectCommonSizes()" class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors">
                                Pointures communes (40-45)
                            </button>
                        </div>

                        @error('size')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">
                            Quantité en stock <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="stock_quantity" name="stock_quantity" required min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                               placeholder="50" value="{{ old('stock_quantity') }}">
                        @error('stock_quantity')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="px-8 py-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Description
                </h2>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description du produit <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" name="description" required rows="6"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                              placeholder="Décrivez les caractéristiques, matériaux, confort...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Images -->
            <div class="px-8 py-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Images du produit
                </h2>
                
                <div class="space-y-4">
                    <!-- Image principale -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Image principale <span class="text-red-500">*</span>
                        </label>
                        <input type="url" id="image" name="image" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                               placeholder="https://example.com/image.jpg" value="{{ old('image') }}">
                        <p class="text-xs text-gray-500 mt-1">URL de l'image principale du produit</p>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Images additionnelles -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Image 2 -->
                        <div>
                            <label for="image_url_2" class="block text-sm font-medium text-gray-700 mb-2">
                                Image 2
                            </label>
                            <input type="url" id="image_url_2" name="image_url_2"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                   placeholder="https://example.com/image2.jpg" value="{{ old('image_url_2') }}">
                            <p class="text-xs text-gray-500 mt-1">Optionnel</p>
                            @error('image_url_2')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image 3 -->
                        <div>
                            <label for="image_url_3" class="block text-sm font-medium text-gray-700 mb-2">
                                Image 3
                            </label>
                            <input type="url" id="image_url_3" name="image_url_3"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                   placeholder="https://example.com/image3.jpg" value="{{ old('image_url_3') }}">
                            <p class="text-xs text-gray-500 mt-1">Optionnel</p>
                            @error('image_url_3')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image 4 -->
                        <div>
                            <label for="image_url_4" class="block text-sm font-medium text-gray-700 mb-2">
                                Image 4
                            </label>
                            <input type="url" id="image_url_4" name="image_url_4"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                   placeholder="https://example.com/image4.jpg" value="{{ old('image_url_4') }}">
                            <p class="text-xs text-gray-500 mt-1">Optionnel</p>
                            @error('image_url_4')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Aide -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-800">
                                    <strong>Conseil :</strong> Ajoutez jusqu'à 4 images pour montrer le produit sous différents angles. L'image principale est obligatoire, les autres sont optionnelles.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promotion -->
            <div class="px-8 py-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Promotion
                    <span class="text-sm text-gray-500 ml-2">(Optionnel)</span>
                </h2>
                
                <div class="space-y-6">
                    <!-- Enable Sale Toggle -->
                    <div>
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   id="on_sale" 
                                   name="on_sale" 
                                   value="1"
                                   onchange="togglePromotionFields()"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="on_sale" class="ml-2 block text-sm text-gray-900">
                                Activer une promotion pour ce produit
                            </label>
                        </div>
                        <p class="text-xs text-gray-500 mt-1 ml-6">
                            Cochez cette case pour proposer ce produit à prix réduit
                        </p>
                    </div>

                    <!-- Promotion Fields (hidden by default) -->
                    <div id="promotionFields" class="space-y-4 hidden">
                        <!-- Sale Price -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="sale_price" class="block text-sm font-medium text-gray-700 mb-2">
                                    Prix promotionnel (€) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="sale_price" name="sale_price" step="0.01" min="0"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                       placeholder="89.99">
                                @error('sale_price')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price Preview -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Aperçu des prix
                                </label>
                                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-600">Prix normal:</span>
                                            <span id="normalPricePreview" class="text-lg font-semibold text-gray-900">€0.00</span>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-600">Prix promo:</span>
                                            <span id="salePricePreview" class="text-lg font-semibold text-green-600">€0.00</span>
                                        </div>
                                        <div class="flex items-center justify-between pt-2 border-t border-gray-300">
                                            <span class="text-sm text-gray-600">Remise:</span>
                                            <span id="discountPreview" class="text-lg font-bold text-indigo-600">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sale Dates -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="sale_start_date" class="block text-sm font-medium text-gray-700 mb-2">
                                    Date de début de promotion
                                </label>
                                <input type="date" id="sale_start_date" name="sale_start_date"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                <p class="text-xs text-gray-500 mt-1">Laissez vide pour commencer immédiatement</p>
                                @error('sale_start_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sale_end_date" class="block text-sm font-medium text-gray-700 mb-2">
                                    Date de fin de promotion
                                </label>
                                <input type="date" id="sale_end_date" name="sale_end_date"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                <p class="text-xs text-gray-500 mt-1">Laissez vide pour une promotion illimitée</p>
                                @error('sale_end_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Sale Description -->
                        <div>
                            <label for="sale_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description de la promotion
                            </label>
                            <textarea id="sale_description" name="sale_description" rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                      placeholder="Ex: -20% pour l'été, Soldes exclusives, Offre limitée..."></textarea>
                            <p class="text-xs text-gray-500 mt-1">Texte qui s'affichera sur la page produit pour expliquer la promotion</p>
                            @error('sale_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div class="px-8 py-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Statut du produit
                </h2>
                
                <div>
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1"
                               {{ request()->old('is_active') == '1' ? 'checked' : 'checked' }}
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            Produit actif (visible sur la boutique)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105 flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Créer le produit</span>
                    </button>
                    
                    <a href="{{ route('admin.products') }}" 
                       class="flex-1 bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>Annuler</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
function selectAllSizes() {
    const checkboxes = document.querySelectorAll('input[name="size[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = true);
}

function deselectAllSizes() {
    const checkboxes = document.querySelectorAll('input[name="size[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = false);
}

function selectCommonSizes() {
    const checkboxes = document.querySelectorAll('input[name="size[]"]');
    const commonSizes = ['40', '41', '42', '43', '44', '45'];
    
    checkboxes.forEach(checkbox => {
        checkbox.checked = commonSizes.includes(checkbox.value);
    });
}

// Générer automatiquement le slug à partir du nom
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    nameInput.addEventListener('input', function() {
        // Ne générer le slug que si le champ slug est vide
        if (slugInput.value === '') {
            const slug = this.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '') // Supprimer les caractères spéciaux
                .replace(/\s+/g, '-') // Remplacer les espaces par des tirets
                .replace(/-+/g, '-') // Éviter les tirets multiples
                .trim('-'); // Supprimer les tirets au début et à la fin
            
            slugInput.value = slug;
        }
    });
    
    // Si le slug est modifié manuellement, ne plus le générer automatiquement
    slugInput.addEventListener('input', function() {
        this.dataset.manual = 'true';
    });
});

function validateForm() {
    // Vérifier qu'au moins une taille est sélectionnée
    const sizeCheckboxes = document.querySelectorAll('input[name="size[]"]:checked');
    if (sizeCheckboxes.length === 0) {
        alert('Veuillez sélectionner au moins une pointure pour le produit.');
        return false;
    }
    
    // Vérifier que le nom n'est pas vide
    const nameInput = document.getElementById('name');
    if (nameInput.value.trim() === '') {
        alert('Le nom du produit est obligatoire.');
        nameInput.focus();
        return false;
    }
    
    // Vérifier que la marque est sélectionnée
    const brandSelect = document.getElementById('brand');
    if (brandSelect.value === '') {
        alert('Veuillez sélectionner une marque.');
        brandSelect.focus();
        return false;
    }
    
    // Vérifier que le prix est valide
    const priceInput = document.getElementById('price');
    if (priceInput.value === '' || parseFloat(priceInput.value) < 0) {
        alert('Veuillez entrer un prix valide.');
        priceInput.focus();
        return false;
    }
    
    // Vérifier que le stock est valide
    const stockInput = document.getElementById('stock_quantity');
    if (stockInput.value === '' || parseInt(stockInput.value) < 0) {
        alert('Veuillez entrer une quantité en stock valide.');
        stockInput.focus();
        return false;
    }
    
    // Vérifier que la description n'est pas vide
    const descriptionInput = document.getElementById('description');
    if (descriptionInput.value.trim() === '') {
        alert('La description du produit est obligatoire.');
        descriptionInput.focus();
        return false;
    }
    
    // Vérifier que l'URL de l'image principale n'est pas vide
    const imageInput = document.getElementById('image');
    if (imageInput.value.trim() === '') {
        alert('L\'URL de l\'image principale est obligatoire.');
        imageInput.focus();
        return false;
    }
    
    // Vérifier les URLs des images additionnelles si elles sont renseignées
    const additionalImageInputs = [
        document.getElementById('image_url_2'),
        document.getElementById('image_url_3'),
        document.getElementById('image_url_4')
    ];
    
    for (let i = 0; i < additionalImageInputs.length; i++) {
        const input = additionalImageInputs[i];
        if (input.value.trim() !== '') {
            // Vérifier que c'est une URL valide
            try {
                new URL(input.value);
            } catch (e) {
                alert(`L'URL de l'image ${i + 2} n'est pas valide.`);
                input.focus();
                return false;
            }
        }
    }
    
    return true;
}

// Toggle promotion fields
function togglePromotionFields() {
    const onSaleCheckbox = document.getElementById('on_sale');
    const promotionFields = document.getElementById('promotionFields');
    
    if (onSaleCheckbox.checked) {
        promotionFields.classList.remove('hidden');
        // Make sale price required when promotion is enabled
        document.getElementById('sale_price').setAttribute('required', 'required');
    } else {
        promotionFields.classList.add('hidden');
        // Remove required attribute when promotion is disabled
        document.getElementById('sale_price').removeAttribute('required');
        // Clear promotion fields
        document.getElementById('sale_price').value = '';
        document.getElementById('sale_start_date').value = '';
        document.getElementById('sale_end_date').value = '';
        document.getElementById('sale_description').value = '';
        updatePricePreview();
    }
}

// Update price preview
function updatePricePreview() {
    const normalPrice = parseFloat(document.getElementById('price').value) || 0;
    const salePrice = parseFloat(document.getElementById('sale_price').value) || 0;
    
    const normalPricePreview = document.getElementById('normalPricePreview');
    const salePricePreview = document.getElementById('salePricePreview');
    const discountPreview = document.getElementById('discountPreview');
    
    normalPricePreview.textContent = '€' + normalPrice.toFixed(2);
    
    if (salePrice > 0 && salePrice < normalPrice) {
        salePricePreview.textContent = '€' + salePrice.toFixed(2);
        const discount = Math.round(((normalPrice - salePrice) / normalPrice) * 100);
        discountPreview.textContent = '-' + discount + '%';
    } else {
        salePricePreview.textContent = '€0.00';
        discountPreview.textContent = '0%';
    }
}

// Add event listeners for price updates
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    const priceInput = document.getElementById('price');
    const salePriceInput = document.getElementById('sale_price');
    
    nameInput.addEventListener('input', function() {
        // Ne générer le slug que si le champ slug est vide
        if (slugInput.value === '') {
            const slug = this.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '') // Supprimer les caractères spéciaux
                .replace(/\s+/g, '-') // Remplacer les espaces par des tirets
                .replace(/-+/g, '-') // Éviter les tirets multiples
                .trim('-'); // Supprimer les tirets au début et à la fin
            
            slugInput.value = slug;
        }
    });
    
    // Si le slug est modifié manuellement, ne plus le générer automatiquement
    slugInput.addEventListener('input', function() {
        this.dataset.manual = 'true';
    });
    
    // Update price preview when prices change
    priceInput.addEventListener('input', updatePricePreview);
    salePriceInput.addEventListener('input', updatePricePreview);
    
    // Initial price preview
    updatePricePreview();
});
</script>
