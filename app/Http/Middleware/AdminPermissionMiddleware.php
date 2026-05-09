<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPermissionMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $permission)
    {
        $admin = Auth::guard('admin')->user();
        
        // Super admin has all permissions
        if ($admin->isSuperAdmin()) {
            return $next($request);
        }
        
        // Check specific permission
        if (!$admin->hasPermission($permission)) {
            abort(403, 'Accès non autorisé. Permissions insuffisantes.');
        }
        
        return $next($request);
    }
}
