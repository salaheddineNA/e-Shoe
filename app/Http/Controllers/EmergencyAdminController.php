<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmergencyAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.emergency-login');
    }

    public function login(Request $request)
    {
        // Forcer la création de l'admin à chaque tentative
        $admin = Admin::updateOrCreate(
            ['email' => 'admin@shoestore.com'],
            [
                'name' => 'Administrateur',
                'email' => 'admin@shoestore.com',
                'password' => Hash::make('admin123'),
                'status' => 'active',
            ]
        );

        // Connexion forcée sans validation
        Auth::guard('admin')->login($admin);
        
        // Forcer la session
        Session::regenerate();
        
        return redirect('/emergency-admin/dashboard');
    }

    public function dashboard()
    {
        // Vérification simple
        if (!Auth::guard('admin')->check()) {
            return redirect('/emergency-admin/login');
        }

        $admin = Auth::guard('admin')->user();
        
        return view('admin.emergency-dashboard', compact('admin'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/emergency-admin/login')->with('message', 'Déconnexion réussie');
    }
}
