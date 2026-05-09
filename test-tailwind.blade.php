@extends('layouts.shop')

@section('title', 'Test Tailwind CSS')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">Test Tailwind CSS</h1>
    
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-3">Carte de test</h2>
        <p class="text-gray-600 mb-4">Cette carte devrait utiliser les classes Tailwind CSS.</p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
            Bouton Tailwind
        </button>
    </div>
    
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-red-500 text-white p-4 rounded">Rouge</div>
        <div class="bg-green-500 text-white p-4 rounded">Vert</div>
        <div class="bg-blue-500 text-white p-4 rounded">Bleu</div>
    </div>
    
    <div class="mt-6">
        <h3 class="text-xl font-bold text-purple-600 mb-2">Test de gradients</h3>
        <div class="bg-gradient-to-r from-purple-400 to-pink-600 h-20 rounded-lg flex items-center justify-center text-white font-bold">
            Gradient Tailwind
        </div>
    </div>
</div>
@endsection
