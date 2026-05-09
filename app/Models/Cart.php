<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id'
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getTotalAttribute()
    {
        return $this->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }

    public function getTotalItemsAttribute()
    {
        return $this->cartItems->sum('quantity');
    }
}
