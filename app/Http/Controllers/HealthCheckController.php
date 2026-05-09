<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HealthCheckController extends Controller
{
    public function health()
    {
        $status = [
            'status' => 'healthy',
            'timestamp' => now()->toISOString(),
            'service' => 'Laravel ShoeStore',
            'version' => app()->version(),
        ];

        // Check database
        try {
            DB::connection()->getPdo();
            $status['database'] = 'connected';
        } catch (\Exception $e) {
            $status['database'] = 'error: ' . $e->getMessage();
            return response()->json($status, 503);
        }

        // Check cache
        try {
            Cache::put('health_check', 'ok', 60);
            $cacheValue = Cache::get('health_check');
            $status['cache'] = $cacheValue === 'ok' ? 'working' : 'error';
        } catch (\Exception $e) {
            $status['cache'] = 'error: ' . $e->getMessage();
        }

        // Check storage
        $status['storage'] = [
            'writable' => is_writable(storage_path()),
            'logs_writable' => is_writable(storage_path('logs')),
        ];

        return response()->json($status, 200);
    }

    public function ready()
    {
        // Comprehensive readiness check
        $checks = [];

        // Database check
        try {
            DB::connection()->getPdo();
            $checks['database'] = true;
        } catch (\Exception $e) {
            $checks['database'] = false;
        }

        // Admin user check
        try {
            $adminCount = \App\Models\Admin::count();
            $checks['admin'] = $adminCount > 0;
        } catch (\Exception $e) {
            $checks['admin'] = false;
        }

        // Migrations check
        try {
            $migrations = DB::table('migrations')->count();
            $checks['migrations'] = $migrations > 0;
        } catch (\Exception $e) {
            $checks['migrations'] = false;
        }

        $allReady = !in_array(false, $checks);

        return response()->json([
            'ready' => $allReady,
            'checks' => $checks,
            'timestamp' => now()->toISOString(),
        ], $allReady ? 200 : 503);
    }
}
