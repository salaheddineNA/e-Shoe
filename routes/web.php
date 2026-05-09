<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;

Route::get('/health', function () {
    // Simple healthcheck that doesn't depend on anything
    return response('OK', 200)
        ->header('Content-Type', 'text/plain');
});

Route::get('/up', function () {
    return response()->json(['status' => 'healthy', 'service' => 'Laravel'], 200);
});

Route::get('/health.txt', function () {
    return response('OK', 200)
        ->header('Content-Type', 'text/plain');
});

Route::get('/ping', function () {
    return response()->json(['pong' => true], 200);
});

// Comprehensive healthcheck routes
Route::get('/health/detailed', [App\Http\Controllers\HealthCheckController::class, 'health']);
Route::get('/ready', [App\Http\Controllers\HealthCheckController::class, 'ready']);

// Debug routes for admin authentication
Route::get('/debug/admin', [App\Http\Controllers\AuthDebugController::class, 'debug']);
Route::get('/debug/create-admin', [App\Http\Controllers\AuthDebugController::class, 'createAdmin']);
Route::get('/test-admin-login', function() {
    return view('admin.test-login');
});

// Simple admin routes for debugging
Route::get('/simple-admin/login', [App\Http\Controllers\SimpleAdminController::class, 'showLoginForm'])->name('simple.admin.login');
Route::post('/simple-admin/login', [App\Http\Controllers\SimpleAdminController::class, 'login'])->name('simple.admin.login.post');
Route::post('/simple-admin/logout', [App\Http\Controllers\SimpleAdminController::class, 'logout'])->name('simple.admin.logout');
Route::get('/simple-admin', [App\Http\Controllers\SimpleAdminController::class, 'dashboard'])->name('simple.admin.dashboard');
Route::get('/simple-admin/login', function() {
    return view('admin.login')->with([
        'form_action' => route('simple.admin.login.post'),
        'title' => 'Connexion Admin (Version Simplifiée)'
    ]);
});

// EMERGENCY ADMIN ROUTES - SOLUTION GARANTIE
Route::get('/emergency-admin/login', [App\Http\Controllers\EmergencyAdminController::class, 'showLoginForm']);
Route::post('/emergency-admin/login', [App\Http\Controllers\EmergencyAdminController::class, 'login']);
Route::get('/emergency-admin/dashboard', [App\Http\Controllers\EmergencyAdminController::class, 'dashboard']);
Route::post('/emergency-admin/logout', [App\Http\Controllers\EmergencyAdminController::class, 'logout']);

// SYSTEM CHECK ROUTES - DIAGNOSTIC COMPLET
Route::get('/system-check', [App\Http\Controllers\SystemCheckController::class, 'check']);
Route::get('/system-fix', [App\Http\Controllers\SystemCheckController::class, 'fix']);

// DATABASE FIX ROUTES - RÉPARATION BASE DE DONNÉES
Route::get('/db-diagnose', [App\Http\Controllers\DatabaseFixController::class, 'diagnose']);
Route::get('/db-fix', [App\Http\Controllers\DatabaseFixController::class, 'fix']);
Route::get('/db-reset', [App\Http\Controllers\DatabaseFixController::class, 'reset']);

// Healthcheck route for Railway
Route::get('/health.txt', function () {
    return response('OK', 200)
        ->header('Content-Type', 'text/plain');
});

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/promotions', [ProductController::class, 'promotions'])->name('products.promotions');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/{id}/review', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/update/{cartItemId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{cartItemId}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::prefix('orders')->group(function () {
    Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/confirmation/{orderId}', [OrderController::class, 'confirmation'])->name('orders.confirmation');
    Route::get('/download/{orderNumber}', [OrderController::class, 'downloadProof'])->name('orders.download-proof');
});

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/download/{submissionId}', [ContactController::class, 'downloadProof'])->name('contact.download-proof');
});

Route::prefix('admin')->group(function () {
    // Routes publiques (login)
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // Routes admin protégées par authentification
    Route::middleware(['admin', 'admin.status'])->group(function () {
        // Dashboard (accessible à tous les admins)
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Profile (accessible à tous les admins)
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/password', [AdminController::class, 'changePassword'])->name('admin.password.change');
        
        // Produits - nécessite la permission manage_products
        Route::middleware('admin.permission:manage_products')->group(function () {
            Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
            Route::get('/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
            Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
            Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
            Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
            Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
        });
        
        // Commandes - nécessite la permission manage_orders
        Route::middleware('admin.permission:manage_orders')->group(function () {
            Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
            Route::get('/orders/{id}', [AdminController::class, 'showOrder'])->name('admin.orders.show');
            Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');
        });
        
        // Messages de contact - nécessite la permission manage_contacts
        Route::middleware('admin.permission:manage_contacts')->group(function () {
            Route::get('/contact-messages', [ContactController::class, 'messages'])->name('admin.contact-messages');
            Route::get('/contact-messages/{message}', [ContactController::class, 'showMessage'])->name('admin.contact-messages.show');
            Route::post('/contact-messages/{message}/reply', [ContactController::class, 'reply'])->name('admin.contact-messages.reply');
            Route::put('/contact-messages/{message}/status', [ContactController::class, 'updateStatus'])->name('admin.contact-messages.update-status');
            Route::delete('/contact-messages/{message}', [ContactController::class, 'destroy'])->name('admin.contact-messages.destroy');
        });
        
        // Gestion des administrateurs - nécessite la permission manage_admins
        Route::middleware('admin.permission:manage_admins')->group(function () {
            Route::get('/admins', [AdminController::class, 'admins'])->name('admin.admins.index');
            Route::get('/admins/create', [AdminController::class, 'createAdmin'])->name('admin.admins.create');
            Route::post('/admins', [AdminController::class, 'storeAdmin'])->name('admin.admins.store');
            Route::get('/admins/{id}/edit', [AdminController::class, 'editAdmin'])->name('admin.admins.edit');
            Route::put('/admins/{id}', [AdminController::class, 'updateAdmin'])->name('admin.admins.update');
            Route::delete('/admins/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.admins.delete');
            Route::post('/admins/{id}/toggle-status', [AdminController::class, 'toggleAdminStatus'])->name('admin.admins.toggle-status');
            Route::post('/admins/{id}/reset-password', [AdminController::class, 'resetAdminPassword'])->name('admin.admins.reset-password');
        });
    });
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/debug', function () {
    return view('debug');
});

Route::get('/test-tailwind', function () {
    return '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Tailwind CSS</title>
    @vite([\'resources/css/app.css\'])
</head>
<body class="bg-gray-100 p-8">
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
</body>
</html>';
});
