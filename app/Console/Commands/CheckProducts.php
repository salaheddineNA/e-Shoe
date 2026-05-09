<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check products data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== PRODUCTS DATA ANALYSIS ===');
        
        $products = \App\Models\Product::all();
        $issuesFound = false;
        
        foreach ($products as $product) {
            $this->info("\n--- Product ID: {$product->id} ---");
            $this->info('Name: ' . $product->name);
            $this->info('Slug: ' . ($product->slug ?: 'MISSING'));
            $this->info('Color: "' . $product->color . '"');
            $this->info('Size: "' . $product->size . '"');
            $this->info('Stock: ' . $product->stock_quantity);
            
            // Check for missing slug
            if (!$product->slug) {
                $this->error('❌ Missing slug');
                $issuesFound = true;
            }
            
            // Check color data format
            if ($product->color) {
                $colors = array_map('trim', explode(',', $product->color));
                $this->info('Parsed colors: [' . implode(', ', $colors) . ']');
                
                if (count($colors) > 1) {
                    $this->info('✅ Multiple colors detected: ' . count($colors));
                }
            }
            
            // Check size data format  
            if ($product->size) {
                $sizes = array_map('trim', explode(',', $product->size));
                $this->info('Parsed sizes: [' . implode(', ', $sizes) . ']');
                
                if (count($sizes) > 1) {
                    $this->info('✅ Multiple sizes detected: ' . count($sizes));
                }
            }
            
            // Check stock
            if ($product->stock_quantity <= 0) {
                $this->warn('⚠️  Out of stock');
            } elseif ($product->stock_quantity <= 5) {
                $this->warn('⚠️  Low stock (' . $product->stock_quantity . ')');
            } else {
                $this->info('✅ Good stock');
            }
        }
        
        $this->info("\n=== SUMMARY ===");
        $this->info('Total products: ' . $products->count());
        
        if ($issuesFound) {
            $this->error('❌ Issues found that need fixing');
        } else {
            $this->info('✅ All products appear to be in good condition');
        }
        
        return 0;
    }
}
