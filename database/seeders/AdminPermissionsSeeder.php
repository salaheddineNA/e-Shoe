<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\AdminPermission;

class AdminPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Donner toutes les permissions au premier administrateur (ID=1)
        $superAdmin = Admin::find(1);
        
        if ($superAdmin) {
            $permissions = [
                'manage_products',
                'manage_orders', 
                'manage_contacts',
                'manage_admins'
            ];
            
            foreach ($permissions as $permission) {
                AdminPermission::firstOrCreate([
                    'admin_id' => $superAdmin->id,
                    'permission' => $permission,
                ]);
            }
            
            $this->command->info('Permissions du super admin créées avec succès!');
        }
    }
}
