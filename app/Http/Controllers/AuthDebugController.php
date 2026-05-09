<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthDebugController extends Controller
{
    public function debug()
    {
        $debug = [];
        
        // Check if admin exists
        $admin = Admin::where('email', 'admin@shoestore.com')->first();
        if ($admin) {
            $debug['admin_exists'] = true;
            $debug['admin_id'] = $admin->id;
            $debug['admin_status'] = $admin->status;
            $debug['password_check'] = Hash::check('admin123', $admin->password);
        } else {
            $debug['admin_exists'] = false;
        }
        
        // Check all admins
        $debug['all_admins'] = Admin::all()->map(function($admin) {
            return [
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'status' => $admin->status,
                'created_at' => $admin->created_at,
            ];
        });
        
        return response()->json($debug);
    }
    
    public function createAdmin()
    {
        // Create or update admin
        $admin = Admin::updateOrCreate(
            ['email' => 'admin@shoestore.com'],
            [
                'name' => 'Administrateur',
                'email' => 'admin@shoestore.com',
                'password' => bcrypt('admin123'),
                'status' => 'active',
            ]
        );
        
        return response()->json([
            'success' => true,
            'admin' => $admin,
            'message' => 'Admin created/updated successfully'
        ]);
    }
}
