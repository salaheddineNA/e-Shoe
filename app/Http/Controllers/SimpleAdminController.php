<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SimpleAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Log pour debug
        Log::info('Tentative de connexion admin', [
            'email' => $request->email,
            'request_data' => $request->all()
        ]);

        // Validation simple
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Log::info('Credentials validés', $credentials);

        // Vérification manuelle de l'admin
        $admin = Admin::where('email', $credentials['email'])->first();
        
        if ($admin) {
            Log::info('Admin trouvé', [
                'id' => $admin->id,
                'email' => $admin->email,
                'status' => $admin->status,
                'password_check' => Hash::check($credentials['password'], $admin->password)
            ]);

            if ($admin->status === 'active' && Hash::check($credentials['password'], $admin->password)) {
                // Connexion manuelle
                Auth::guard('admin')->login($admin);
                
                Log::info('Connexion réussie', [
                    'admin_id' => $admin->id,
                    'session_id' => session()->getId()
                ]);

                $request->session()->regenerate();
                $admin->updateLastLogin();
                
                return redirect()->route('admin.dashboard')->with('success', 'Connexion réussie!');
            }
        }

        Log::warning('Échec de connexion', [
            'email' => $credentials['email'],
            'reason' => $admin ? 'wrong_password_or_inactive' : 'admin_not_found'
        ]);

        return back()
            ->withErrors(['email' => 'Identifiants incorrectes'])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')->with('success', 'Déconnexion réussie.');
    }

    public function dashboard()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        return view('admin.simple-dashboard');
    }
}
