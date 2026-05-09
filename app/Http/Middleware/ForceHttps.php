<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only force HTTPS if not behind a proxy (like Railway)
        if (app()->environment('production') && !$request->secure() && !$request->hasHeader('X-Forwarded-Proto')) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
