<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'total_amount',
        'payment_method',
        'status',
        'notes'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber()
    {
        $latest = self::latest()->first();
        $number = $latest ? intval(substr($latest->order_number, -6)) + 1 : 1;
        return 'ORD' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }
}
