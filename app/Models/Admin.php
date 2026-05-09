<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Get the permissions for the admin.
     */
    public function permissions()
    {
        return $this->hasMany(AdminPermission::class);
    }

    /**
     * Check if admin has a specific permission
     */
    public function hasPermission($permission)
    {
        return $this->permissions()->where('permission', $permission)->exists();
    }

    /**
     * Get all permission names for the admin
     */
    public function getPermissionNames()
    {
        return $this->permissions()->pluck('permission')->toArray();
    }

    /**
     * Check if admin is super admin (only the first admin)
     */
    public function isSuperAdmin()
    {
        return $this->id === 1;
    }

    /**
     * Check if admin account is active
     */
    public function isActive()
    {
        return $this->status === 'active';
    }

    /**
     * Check if admin account is inactive
     */
    public function isInactive()
    {
        return $this->status === 'inactive';
    }

    /**
     * Activate admin account
     */
    public function activate()
    {
        $this->status = 'active';
        $this->save();
    }

    /**
     * Deactivate admin account
     */
    public function deactivate()
    {
        $this->status = 'inactive';
        $this->save();
    }

    /**
     * Update last login time
     */
    public function updateLastLogin()
    {
        $this->last_login_at = now();
        $this->save();
    }

    /**
     * Get status label with color
     */
    public function getStatusLabel()
    {
        return $this->status === 'active' 
            ? '<span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Actif</span>'
            : '<span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded">Inactif</span>';
    }
}
