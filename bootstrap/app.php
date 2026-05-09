<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'admin.permission' => \App\Http\Middleware\AdminPermissionMiddleware::class,
            'admin.status' => \App\Http\Middleware\CheckAdminStatus::class,
            'force.https' => \App\Http\Middleware\ForceHttps::class,
        ]);
        
        // Apply ForceHttps to all web routes in production ONLY if not behind proxy
        if (!app()->environment('production') || !isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            $middleware->web(append: [
                \App\Http\Middleware\ForceHttps::class,
            ]);
        }
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
