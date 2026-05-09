<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'permission',
    ];

    /**
     * Get the admin that owns the permission.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Available permissions
     */
    public static $permissions = [
        'manage_products' => 'Gérer les produits',
        'manage_orders' => 'Gérer les commandes',
        'manage_contacts' => 'Gérer les messages de contact',
        'manage_admins' => 'Gérer les administrateurs',
    ];
}
