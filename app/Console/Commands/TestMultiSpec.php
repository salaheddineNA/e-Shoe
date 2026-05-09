<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestMultiSpec extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-multi-spec';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $product = new \App\Models\Product();
        $product->name = 'Test Multi-Specifications';
        $product->slug = 'test-multi-specifications';
        $product->description = 'Produit de test avec plusieurs couleurs et tailles.';
        $product->price = 100.00;
        $product->brand = 'Test Brand';
        $product->color = 'Noir, Blanc, Rouge';
        $product->size = '40, 41, 42, 43';
        $product->image = 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=800';
        $product->stock_quantity = 50;
        $product->is_active = true;
        $product->save();
        
        $this->info('Produit test créé avec ID: ' . $product->id);
        return 0;
    }
}
