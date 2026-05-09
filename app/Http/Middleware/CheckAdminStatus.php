<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'admin est connecté
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            
            // Vérifier si le compte est inactif
            if ($admin->isInactive()) {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')
                    ->with('error', 'Votre compte a été désactivé. Veuillez contacter l\'administrateur principal.');
            }
        }
        
        return $next($request);
    }
}
