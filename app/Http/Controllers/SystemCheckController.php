<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;

class SystemCheckController extends Controller
{
    public function check()
    {
        $checks = [];
        
        // 1. Database Connection
        try {
            DB::connection()->getPdo();
            $checks['database'] = [
                'status' => 'success',
                'message' => 'Database connection successful',
                'connection' => config('database.default'),
                'database' => config('database.connections.' . config('database.default') . '.database')
            ];
        } catch (\Exception $e) {
            $checks['database'] = [
                'status' => 'error',
                'message' => 'Database connection failed: ' . $e->getMessage()
            ];
        }
        
        // 2. Tables Existence
        $tables = ['admins', 'users', 'products', 'orders'];
        $checks['tables'] = [];
        foreach ($tables as $table) {
            $checks['tables'][$table] = Schema::hasTable($table);
        }
        
        // 3. Admin Table Data
        try {
            $adminCount = Admin::count();
            $checks['admins'] = [
                'count' => $adminCount,
                'exists' => $adminCount > 0,
                'sample' => Admin::take(3)->get()->toArray()
            ];
        } catch (\Exception $e) {
            $checks['admins'] = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
        
        // 4. Session Configuration
        $checks['session'] = [
            'driver' => config('session.driver'),
            'lifetime' => config('session.lifetime'),
            'path' => config('session.path'),
            'domain' => config('session.domain'),
            'secure' => config('session.secure'),
            'same_site' => config('session.same_site'),
            'encrypt' => config('session.encrypt'),
        ];
        
        // 5. Environment Variables
        $checks['env'] = [
            'app_env' => config('app.env'),
            'app_debug' => config('app.debug'),
            'app_url' => config('app.url'),
            'asset_url' => config('app.asset_url'),
        ];
        
        // 6. Storage Permissions
        $checks['storage'] = [
            'storage_writable' => is_writable(storage_path()),
            'cache_writable' => is_writable(storage_path('framework/cache')),
            'sessions_writable' => is_writable(storage_path('framework/sessions')),
            'views_writable' => is_writable(storage_path('framework/views')),
            'logs_writable' => is_writable(storage_path('logs')),
        ];
        
        // 7. Application Key
        $checks['app_key'] = [
            'set' => !empty(config('app.key')),
            'length' => strlen(config('app.key')),
        ];
        
        // 8. HTTPS/SSL
        $checks['https'] = [
            'https_enabled' => request()->secure(),
            'app_url_https' => str_starts_with(config('app.url'), 'https'),
        ];
        
        return response()->json($checks);
    }
    
    public function fix()
    {
        $results = [];
        
        // Fix 1: Create database if not exists
        try {
            $dbPath = config('database.connections.sqlite.database');
            if (!file_exists($dbPath)) {
                $dir = dirname($dbPath);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }
                touch($dbPath);
                chmod($dbPath, 0666);
                $results['database_created'] = 'Database file created at: ' . $dbPath;
            } else {
                $results['database_created'] = 'Database already exists at: ' . $dbPath;
            }
        } catch (\Exception $e) {
            $results['database_error'] = $e->getMessage();
        }
        
        // Fix 2: Run migrations
        try {
            \Artisan::call('migrate', ['--force' => true]);
            $results['migrations'] = 'Migrations completed successfully';
        } catch (\Exception $e) {
            $results['migrations_error'] = $e->getMessage();
        }
        
        // Fix 3: Run seeders
        try {
            \Artisan::call('db:seed', ['--class' => 'AdminSeeder', '--force' => true]);
            \Artisan::call('db:seed', ['--class' => 'AdminPermissionsSeeder', '--force' => true]);
            $results['seeders'] = 'Admin and permissions seeded successfully';
        } catch (\Exception $e) {
            $results['seeders_error'] = $e->getMessage();
        }
        
        // Fix 4: Clear cache
        try {
            \Artisan::call('config:clear');
            \Artisan::call('cache:clear');
            \Artisan::call('route:clear');
            \Artisan::call('view:clear');
            $results['cache_cleared'] = 'All caches cleared successfully';
        } catch (\Exception $e) {
            $results['cache_error'] = $e->getMessage();
        }
        
        // Fix 5: Generate key
        try {
            if (empty(config('app.key'))) {
                \Artisan::call('key:generate', ['--force' => true]);
                $results['key_generated'] = 'Application key generated';
            } else {
                $results['key_generated'] = 'Application key already exists';
            }
        } catch (\Exception $e) {
            $results['key_error'] = $e->getMessage();
        }
        
        return response()->json($results);
    }
}
