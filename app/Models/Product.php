<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'on_sale',
        'sale_start_date',
        'sale_end_date',
        'sale_description',
        'image',
        'image_url_2',
        'image_url_3',
        'image_url_4',
        'stock_quantity',
        'brand',
        'color',
        'size',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'on_sale' => 'boolean',
        'is_active' => 'boolean',
        'sale_start_date' => 'date',
        'sale_end_date' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews()
    {
        return $this->reviews()->approved();
    }

    public function getAverageRatingAttribute()
    {
        return $this->approvedReviews()->avg('rating') ?? 0;
    }

    public function getReviewCountAttribute()
    {
        return $this->approvedReviews()->count();
    }

    // Promotion methods
    public function isCurrentlyOnSale()
    {
        if (!$this->on_sale || !$this->sale_price) {
            return false;
        }

        $today = now()->toDateString();
        
        if ($this->sale_start_date && $today < $this->sale_start_date) {
            return false;
        }
        
        if ($this->sale_end_date && $today > $this->sale_end_date) {
            return false;
        }
        
        return true;
    }

    public function getCurrentPrice()
    {
        return $this->isCurrentlyOnSale() ? $this->sale_price : $this->price;
    }

    public function getDiscountPercentage()
    {
        if (!$this->isCurrentlyOnSale() || !$this->sale_price) {
            return 0;
        }
        
        return round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    public function getFormattedOriginalPrice()
    {
        return '€' . number_format($this->price, 2);
    }

    public function getFormattedSalePrice()
    {
        return $this->sale_price ? '€' . number_format($this->sale_price, 2) : null;
    }

    public function getFormattedCurrentPrice()
    {
        return '€' . number_format($this->getCurrentPrice(), 2);
    }

    public function scopeOnSale($query)
    {
        return $query->where('on_sale', true)
                    ->where('sale_price', '>', 0)
                    ->where(function ($q) {
                        $today = now()->toDateString();
                        $q->whereNull('sale_start_date')
                          ->orWhere('sale_start_date', '<=', $today);
                    })
                    ->where(function ($q) {
                        $today = now()->toDateString();
                        $q->whereNull('sale_end_date')
                          ->orWhere('sale_end_date', '>=', $today);
                    });
    }

    /**
     * Get all product images as an array
     */
    public function getAllImages()
    {
        $images = [];
        
        if ($this->image) {
            $images[] = $this->image;
        }
        
        if ($this->image_url_2) {
            $images[] = $this->image_url_2;
        }
        
        if ($this->image_url_3) {
            $images[] = $this->image_url_3;
        }
        
        if ($this->image_url_4) {
            $images[] = $this->image_url_4;
        }
        
        return $images;
    }

    /**
     * Get the first image (main image)
     */
    public function getMainImage()
    {
        return $this->image ?: 'https://via.placeholder.com/400x300?text=No+Image';
    }

    /**
     * Get additional images (excluding main image)
     */
    public function getAdditionalImages()
    {
        $images = [];
        
        if ($this->image_url_2) {
            $images[] = $this->image_url_2;
        }
        
        if ($this->image_url_3) {
            $images[] = $this->image_url_3;
        }
        
        if ($this->image_url_4) {
            $images[] = $this->image_url_4;
        }
        
        return $images;
    }
}
