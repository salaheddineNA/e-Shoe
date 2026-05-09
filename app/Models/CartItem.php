<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'color',
        'size',
        'quantity'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getSubtotalAttribute()
    {
        $price = $this->product->getCurrentPrice();
        return $this->quantity * $price;
    }

    public function getFormattedSubtotalAttribute()
    {
        return '€' . number_format($this->subtotal, 2);
    }

    public function getUnitPriceAttribute()
    {
        return $this->product->getCurrentPrice();
    }

    public function getFormattedUnitPriceAttribute()
    {
        return '€' . number_format($this->unit_price, 2);
    }

    public function getOriginalUnitPriceAttribute()
    {
        return $this->product->price;
    }

    public function getFormattedOriginalUnitPriceAttribute()
    {
        return '€' . number_format($this->original_unit_price, 2);
    }

    public function getDiscountAmountAttribute()
    {
        if ($this->product->isCurrentlyOnSale()) {
            return ($this->product->price - $this->product->getCurrentPrice()) * $this->quantity;
        }
        return 0;
    }

    public function getFormattedDiscountAmountAttribute()
    {
        return '€' . number_format($this->discount_amount, 2);
    }
}
