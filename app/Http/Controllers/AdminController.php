<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Admin;
use App\Models\AdminPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            
            // Mettre à jour la date de dernière connexion
            Auth::guard('admin')->user()->updateLastLogin();
            
            return redirect()->route('admin.dashboard')->with('success', 'Connexion réussie!');
        }

        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')->with('success', 'Déconnexion réussie.');
    }

    // Dashboard
    public function dashboard()
    {
        // Basic statistics
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        
        // Revenue statistics
        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
        $monthRevenue = Order::where('status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');
        
        // Stock alerts
        $lowStockProducts = Product::where('stock_quantity', '<=', 5)->where('stock_quantity', '>', 0)->get();
        $outOfStockProducts = Product::where('stock_quantity', '<=', 0)->get();
        
        // Recent orders
        $recentOrders = Order::with('orderItems')->latest()->take(5)->get();
        
        // Top selling products
        $topProducts = Product::withCount(['orderItems' => function($query) {
            $query->whereHas('order', function($q) {
                $q->where('status', 'completed');
            });
        }])->orderBy('order_items_count', 'desc')->take(5)->get();
        
        // Orders by status for chart
        $ordersByStatus = [
            'pending' => $pendingOrders,
            'processing' => $processingOrders,
            'completed' => $completedOrders,
        ];
        
        // Monthly revenue for last 6 months
        $monthlyRevenue = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $revenue = Order::where('status', 'completed')
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->sum('total_amount');
            $monthlyRevenue[] = [
                'month' => $month->format('M Y'),
                'revenue' => $revenue
            ];
        }
        
        // Reviews pending approval
        $pendingReviews = \App\Models\Review::where('is_approved', false)->count();
        
        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders', 
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'totalRevenue',
            'monthRevenue',
            'lowStockProducts',
            'outOfStockProducts',
            'recentOrders',
            'topProducts',
            'ordersByStatus',
            'monthlyRevenue',
            'pendingReviews'
        ));
    }

    public function products()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.products.create');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'on_sale' => 'boolean',
            'sale_start_date' => 'nullable|date',
            'sale_end_date' => 'nullable|date|after_or_equal:sale_start_date',
            'sale_description' => 'nullable|string|max:500',
            'stock_quantity' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
            'colors' => 'nullable|array',
            'colors.*' => 'string|max:255',
            'all_colors' => 'nullable|boolean',
            'size' => 'required|array',
            'size.*' => 'string|max:255',
            'image' => 'required|string|max:255',
            'image_url_2' => 'nullable|url|max:255',
            'image_url_3' => 'nullable|url|max:255',
            'image_url_4' => 'nullable|url|max:255',
            'is_active' => 'boolean'
        ]);

        // Préparer les données
        $productData = $request->except(['colors', 'size', 'all_colors']);
        
        // Gérer les couleurs
        if ($request->has('all_colors') && $request->all_colors) {
            // Si disponible dans toutes les couleurs
            $allColors = ['Noir', 'Blanc', 'Rouge', 'Bleu', 'Vert', 'Jaune', 'Violet', 'Orange', 'Rose', 'Gris', 'Marron', 'Marine', 'Personnalisé'];
            $productData['color'] = implode(', ', $allColors);
        } elseif ($request->has('colors') && is_array($request->colors) && count($request->colors) > 0) {
            // Si couleurs spécifiques sélectionnées
            $productData['color'] = implode(', ', $request->colors);
        } else {
            $productData['color'] = '';
        }
        
        // Gérer les pointures
        if ($request->has('size') && is_array($request->size) && count($request->size) > 0) {
            $productData['size'] = implode(', ', $request->size);
        } else {
            $productData['size'] = '';
        }

        // Gérer le statut actif
        $productData['is_active'] = $request->has('is_active') ? true : false;

        // Gérer les champs de promotion
        $productData['on_sale'] = $request->has('on_sale') ? true : false;
        
        if ($productData['on_sale']) {
            $productData['sale_price'] = $request->input('sale_price');
            $productData['sale_start_date'] = $request->input('sale_start_date');
            $productData['sale_end_date'] = $request->input('sale_end_date');
            $productData['sale_description'] = $request->input('sale_description');
        } else {
            $productData['sale_price'] = null;
            $productData['sale_start_date'] = null;
            $productData['sale_end_date'] = null;
            $productData['sale_description'] = null;
        }

        Product::create($productData);
        return redirect()->route('admin.products')->with('success', 'Produit ajouté avec succès!');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'on_sale' => 'boolean',
            'sale_start_date' => 'nullable|date',
            'sale_end_date' => 'nullable|date|after_or_equal:sale_start_date',
            'sale_description' => 'nullable|string|max:500',
            'stock_quantity' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
            'colors' => 'nullable|array',
            'colors.*' => 'string|max:255',
            'all_colors' => 'nullable|boolean',
            'size' => 'required|array',
            'size.*' => 'string|max:255',
            'image' => 'required|string|max:255',
            'image_url_2' => 'nullable|url|max:255',
            'image_url_3' => 'nullable|url|max:255',
            'image_url_4' => 'nullable|url|max:255',
            'is_active' => 'boolean'
        ]);

        // Préparer les données
        $productData = $request->except(['colors', 'size', 'all_colors']);
        
        // Gérer les couleurs
        if ($request->has('all_colors') && $request->all_colors) {
            // Si disponible dans toutes les couleurs
            $allColors = ['Noir', 'Blanc', 'Rouge', 'Bleu', 'Vert', 'Jaune', 'Violet', 'Orange', 'Rose', 'Gris', 'Marron', 'Marine', 'Personnalisé'];
            $productData['color'] = implode(', ', $allColors);
        } elseif ($request->has('colors') && is_array($request->colors) && count($request->colors) > 0) {
            // Si couleurs spécifiques sélectionnées
            $productData['color'] = implode(', ', $request->colors);
        } else {
            $productData['color'] = '';
        }
        
        // Gérer les pointures
        if ($request->has('size') && is_array($request->size) && count($request->size) > 0) {
            $productData['size'] = implode(', ', $request->size);
        } else {
            $productData['size'] = '';
        }

        // Gérer le statut actif
        $productData['is_active'] = $request->has('is_active') ? true : false;

        // Gérer les champs de promotion
        $productData['on_sale'] = $request->has('on_sale') ? true : false;
        
        if ($productData['on_sale']) {
            $productData['sale_price'] = $request->input('sale_price');
            $productData['sale_start_date'] = $request->input('sale_start_date');
            $productData['sale_end_date'] = $request->input('sale_end_date');
            $productData['sale_description'] = $request->input('sale_description');
        } else {
            $productData['sale_price'] = null;
            $productData['sale_start_date'] = null;
            $productData['sale_end_date'] = null;
            $productData['sale_description'] = null;
        }

        // Si le slug est vide, le générer automatiquement
        if (empty($productData['slug'])) {
            $productData['slug'] = \Illuminate\Support\Str::slug($request->name);
        }

        $product->update($productData);
        return redirect()->route('admin.products')->with('success', 'Produit mis à jour!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Produit supprimé!');
    }

    public function orders()
    {
        $orders = Order::with('orderItems')->latest()->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function showOrder($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return back()->with('success', 'Statut de la commande mis à jour!');
    }

    // Profile management
    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        
        // Si l'email change, demander le mot de passe actuel
        if ($request->email !== $admin->email) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
                'password_confirmation' => 'required',
            ]);

            // Vérifier le mot de passe actuel
            if (!Hash::check($request->password_confirmation, $admin->password)) {
                return back()->withErrors(['password_confirmation' => 'Le mot de passe actuel est requis pour modifier l\'adresse email.']);
            }

            // Mettre à jour le nom et l'email dans la base de données
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return back()->with('success', 'Profil mis à jour avec succès! L\'email a été modifié.');
        } else {
            // Si seul le nom change, pas besoin de mot de passe
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            ]);

            // Mettre à jour le nom dans la base de données
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return back()->with('success', 'Profil mis à jour avec succès!');
        }
    }

    public function changePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Vérifier le mot de passe actuel depuis la base de données
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe dans la base de données
        $admin->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Mot de passe changé avec succès!');
    }

    // Admin management
    public function admins()
    {
        $admins = Admin::latest()->get();
        $monthlyAdmins = Admin::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        return view('admin.admins.index', compact('admins', 'monthlyAdmins'));
    }

    public function createAdmin()
    {
        return view('admin.admins.create');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email',
            'password' => 'required|min:8|confirmed',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|in:manage_products,manage_orders,manage_contacts,manage_admins',
        ]);

        // Créer le nouvel administrateur
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Ajouter les permissions dans la base de données
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission) {
                AdminPermission::create([
                    'admin_id' => $admin->id,
                    'permission' => $permission,
                ]);
            }
        }

        return redirect()->route('admin.admins.index')->with('success', 'Administrateur créé avec succès!');
    }

    public function editAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        
        // Protection du super admin (ID=1)
        if ($admin->id === 1) {
            return back()->with('error', 'Impossible de modifier le compte administrateur principal.');
        }
        
        return view('admin.admins.edit', compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        
        // Protection du super admin (ID=1)
        if ($admin->id === 1) {
            return back()->with('error', 'Impossible de modifier le compte administrateur principal.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|in:manage_products,manage_orders,manage_contacts,manage_admins',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Mettre à jour les permissions dans la base de données
        // Supprimer d'abord toutes les permissions existantes
        $admin->permissions()->delete();
        
        // Ajouter les nouvelles permissions
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission) {
                AdminPermission::create([
                    'admin_id' => $admin->id,
                    'permission' => $permission,
                ]);
            }
        }

        return redirect()->route('admin.admins.index')->with('success', 'Administrateur mis à jour avec succès!');
    }

    public function deleteAdmin($id)
    {
        // Empêcher la suppression de soi-même
        if ($id == Auth::guard('admin')->user()->id) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        // Protection du super admin (ID=1)
        if ($id == 1) {
            return back()->with('error', 'Impossible de supprimer le compte administrateur principal.');
        }

        $admin = Admin::findOrFail($id);
        // Les permissions seront supprimées automatiquement grâce à onDelete('cascade')
        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Administrateur supprimé avec succès!');
    }

    /**
     * Toggle admin status (activate/deactivate)
     */
    public function toggleAdminStatus($id)
    {
        // Protection du super admin (ID=1)
        if ($id == 1) {
            return back()->with('error', 'Impossible de modifier le statut du compte administrateur principal.');
        }

        // Empêcher la modification de son propre statut
        if ($id == Auth::guard('admin')->user()->id) {
            return back()->with('error', 'Vous ne pouvez pas modifier votre propre statut.');
        }

        $admin = Admin::findOrFail($id);
        
        if ($admin->status === 'active') {
            $admin->deactivate();
            $message = 'Administrateur désactivé avec succès!';
        } else {
            $admin->activate();
            $message = 'Administrateur activé avec succès!';
        }

        return redirect()->route('admin.admins.index')->with('success', $message);
    }

    /**
     * Reset admin password
     */
    public function resetAdminPassword($id)
    {
        // Protection du super admin (ID=1)
        if ($id == 1) {
            return back()->with('error', 'Impossible de réinitialiser le mot de passe du compte administrateur principal.');
        }

        $admin = Admin::findOrFail($id);
        
        // Générer un mot de passe temporaire
        $tempPassword = 'Admin' . rand(1000, 9999) . '!';
        $admin->password = Hash::make($tempPassword);
        $admin->save();

        return redirect()->route('admin.admins.index')->with('success', "Mot de passe réinitialisé avec succès! Nouveau mot de passe temporaire: {$tempPassword}");
    }
}
