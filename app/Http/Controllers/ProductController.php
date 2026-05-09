<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true);
        
        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('brand', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        
        // Filter by brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->input('brand'));
        }
        
        // Filter by color
        if ($request->filled('color')) {
            $query->where('color', 'LIKE', '%' . $request->input('color') . '%');
        }
        
        // Filter by size
        if ($request->filled('size')) {
            $query->where('size', 'LIKE', '%' . $request->input('size') . '%');
        }
        
        // Filter by sale products
        if ($request->filled('on_sale') && $request->input('on_sale') == '1') {
            $query->onSale();
        }
        
        // Price range filtering
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }
        
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }
        
        // Sorting
        $sortBy = $request->input('sort', 'name');
        $direction = $request->input('direction', 'asc');
        
        switch($sortBy) {
            case 'price':
                $query->orderBy('price', $direction);
                break;
            case 'stock':
                $query->orderBy('stock_quantity', $direction);
                break;
            case 'created_at':
                $query->orderBy('created_at', $direction);
                break;
            default:
                $query->orderBy('name', 'asc');
        }
        
        $products = $query->paginate(12);
        
        // Separate products into sale and non-sale categories
        $saleProducts = clone $query;
        $saleProducts = $saleProducts->onSale()->paginate(12);
        
        $regularProducts = clone $query;
        $regularProducts = $regularProducts->where(function($q) {
            $q->where('on_sale', false)
              ->orWhereNull('on_sale')
              ->orWhere(function($subQ) {
                  $subQ->where('on_sale', true)
                       ->where(function($dateQ) {
                           $dateQ->whereNull('sale_start_date')
                                ->orWhereNull('sale_end_date')
                                ->orWhere('sale_start_date', '>', now())
                                ->orWhere('sale_end_date', '<', now());
                       });
              });
        })->paginate(12);
        
        // Get filter options
        $brands = Product::where('is_active', true)->distinct()->pluck('brand')->sort();
        $colors = Product::where('is_active', true)->distinct()->pluck('color');
        $sizes = Product::where('is_active', true)->distinct()->pluck('size');
        
        return view('products.index', compact('products', 'saleProducts', 'regularProducts', 'brands', 'colors', 'sizes'));
    }

    public function home()
    {
        return view('home');
    }

    public function promotions(Request $request)
    {
        $query = Product::where('is_active', true)->onSale();
        
        // Search functionality for promotions
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('brand', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        
        // Filter by brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->input('brand'));
        }
        
        // Filter by color
        if ($request->filled('color')) {
            $query->where('color', 'LIKE', '%' . $request->input('color') . '%');
        }
        
        // Filter by size
        if ($request->filled('size')) {
            $query->where('size', 'LIKE', '%' . $request->input('size') . '%');
        }
        
        // Price range filtering for promotions
        if ($request->filled('min_price')) {
            $query->where('sale_price', '>=', $request->input('min_price'));
        }
        
        if ($request->filled('max_price')) {
            $query->where('sale_price', '<=', $request->input('max_price'));
        }
        
        // Sorting for promotions
        $sortBy = $request->input('sort', 'discount');
        $direction = $request->input('direction', 'desc');
        
        switch($sortBy) {
            case 'sale_price':
                $query->orderBy('sale_price', $direction);
                break;
            case 'original_price':
                $query->orderBy('price', $direction);
                break;
            case 'stock':
                $query->orderBy('stock_quantity', $direction);
                break;
            case 'created_at':
                $query->orderBy('created_at', $direction);
                break;
            case 'discount':
            default:
                // Sort by discount percentage (calculated)
                $query->orderByRaw('(price - sale_price) / price DESC');
                break;
        }
        
        $products = $query->paginate(12);
        
        // Get filter options for promotions
        $brands = Product::where('is_active', true)->onSale()->distinct()->pluck('brand')->sort();
        $colors = Product::where('is_active', true)->onSale()->distinct()->pluck('color');
        $sizes = Product::where('is_active', true)->onSale()->distinct()->pluck('size');
        
        // Calculate statistics
        $stats = [
            'total_products' => Product::where('is_active', true)->count(),
            'sale_products' => Product::where('is_active', true)->onSale()->count(),
            'avg_discount' => Product::where('is_active', true)->onSale()
                ->selectRaw('AVG(((price - sale_price) / price) * 100) as avg_discount')
                ->value('avg_discount'),
            'max_discount' => Product::where('is_active', true)->onSale()
                ->selectRaw('MAX(((price - sale_price) / price) * 100) as max_discount')
                ->value('max_discount')
        ];
        
        return view('products.promotions', compact('products', 'brands', 'colors', 'sizes', 'stats'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('products.show', compact('product'));
    }
}
