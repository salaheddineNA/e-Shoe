<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin account
        Admin::firstOrCreate([
            'email' => 'admin@shoestore.com',
        ], [
            'name' => 'Administrateur',
            'email' => 'admin@shoestore.com',
            'password' => bcrypt('admin123'),
            'status' => 'active',
        ]);
        
        $this->command->info('Administrateur par défaut créé avec succès!');
        $this->command->info('Email: admin@shoestore.com');
        $this->command->info('Mot de passe: admin123');
    }
}
