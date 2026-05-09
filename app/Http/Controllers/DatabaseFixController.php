<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class DatabaseFixController extends Controller
{
    public function diagnose()
    {
        $diagnosis = [];
        
        // 1. Check database configuration
        $diagnosis['config'] = [
            'default_connection' => config('database.default'),
            'sqlite_path' => config('database.connections.sqlite.database'),
            'file_exists' => file_exists(config('database.connections.sqlite.database')),
            'file_writable' => is_writable(dirname(config('database.connections.sqlite.database'))),
            'file_permissions' => file_exists(config('database.connections.sqlite.database')) ? substr(sprintf('%o', fileperms(config('database.connections.sqlite.database'))), -4) : 'N/A'
        ];
        
        // 2. Test database connection
        try {
            $pdo = DB::connection()->getPdo();
            $diagnosis['connection'] = [
                'status' => 'success',
                'message' => 'Database connection successful',
                'pdo_available' => true,
                'sqlite_version' => $pdo->getAttribute(\PDO::ATTR_SERVER_VERSION)
            ];
        } catch (\Exception $e) {
            $diagnosis['connection'] = [
                'status' => 'error',
                'message' => $e->getMessage(),
                'error_code' => $e->getCode()
            ];
        }
        
        // 3. Check tables
        try {
            $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table'");
            $diagnosis['tables'] = [
                'status' => 'success',
                'count' => count($tables),
                'tables' => array_column($tables, 'name')
            ];
        } catch (\Exception $e) {
            $diagnosis['tables'] = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
        
        // 4. Check migrations table
        try {
            $migrations_count = DB::table('migrations')->count();
            $diagnosis['migrations'] = [
                'status' => 'success',
                'count' => $migrations_count,
                'table_exists' => Schema::hasTable('migrations')
            ];
        } catch (\Exception $e) {
            $diagnosis['migrations'] = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
        
        return response()->json($diagnosis);
    }
    
    public function fix()
    {
        $results = [];
        
        // Step 1: Create database directory and file
        $dbPath = config('database.connections.sqlite.database');
        $dbDir = dirname($dbPath);
        
        try {
            if (!is_dir($dbDir)) {
                mkdir($dbDir, 0755, true);
                $results['directory_created'] = "Created directory: $dbDir";
            }
            
            if (!file_exists($dbPath)) {
                touch($dbPath);
                chmod($dbPath, 0666);
                $results['database_created'] = "Created database file: $dbPath";
            } else {
                chmod($dbPath, 0666);
                $results['database_permissions'] = "Set permissions on: $dbPath";
            }
        } catch (\Exception $e) {
            $results['database_error'] = $e->getMessage();
            return response()->json($results, 500);
        }
        
        // Step 2: Test connection
        try {
            DB::connection()->getPdo();
            $results['connection_test'] = "Database connection successful";
        } catch (\Exception $e) {
            $results['connection_error'] = $e->getMessage();
            return response()->json($results, 500);
        }
        
        // Step 3: Run migrations
        try {
            \Artisan::call('migrate', ['--force' => true]);
            $results['migrations'] = "Migrations completed successfully";
        } catch (\Exception $e) {
            $results['migration_error'] = $e->getMessage();
        }
        
        // Step 4: Run seeders
        try {
            \Artisan::call('db:seed', ['--class' => 'AdminSeeder', '--force' => true]);
            \Artisan::call('db:seed', ['--class' => 'AdminPermissionsSeeder', '--force' => true]);
            $results['seeders'] = "Admin and permissions seeded successfully";
        } catch (\Exception $e) {
            $results['seeder_error'] = $e->getMessage();
        }
        
        // Step 5: Verify admin exists
        try {
            $adminCount = \App\Models\Admin::count();
            $results['admin_check'] = "Found $adminCount admin(s) in database";
        } catch (\Exception $e) {
            $results['admin_check_error'] = $e->getMessage();
        }
        
        return response()->json($results);
    }
    
    public function reset()
    {
        $results = [];
        
        try {
            // Delete database file
            $dbPath = config('database.connections.sqlite.database');
            if (file_exists($dbPath)) {
                unlink($dbPath);
                $results['database_deleted'] = "Deleted existing database: $dbPath";
            }
            
            // Recreate database
            touch($dbPath);
            chmod($dbPath, 0666);
            $results['database_recreated'] = "Recreated database: $dbPath";
            
            // Run migrations
            \Artisan::call('migrate', ['--force' => true]);
            $results['migrations'] = "Fresh migrations completed";
            
            // Run seeders
            \Artisan::call('db:seed', ['--class' => 'AdminSeeder', '--force' => true]);
            \Artisan::call('db:seed', ['--class' => 'AdminPermissionsSeeder', '--force' => true]);
            $results['seeders'] = "Admin and permissions seeded successfully";
            
            // Clear caches
            \Artisan::call('config:clear');
            \Artisan::call('cache:clear');
            \Artisan::call('route:clear');
            \Artisan::call('view:clear');
            $results['cache_cleared'] = "All caches cleared";
            
        } catch (\Exception $e) {
            $results['error'] = $e->getMessage();
            return response()->json($results, 500);
        }
        
        return response()->json($results);
    }
}
