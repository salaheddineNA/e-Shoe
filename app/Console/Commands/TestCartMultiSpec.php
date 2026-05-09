<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCartMultiSpec extends Command
{
    protected $signature = 'app:test-cart-multi-spec';
    protected $description = 'Test multi-specification cart functionality';

    public function handle()
    {
        $this->info('=== TEST MULTI-SPECIFICATIONS CART ===');
        
        // Get the test product
        $product = \App\Models\Product::where('slug', 'test-multi-specifications')->first();
        
        if (!$product) {
            $this->error('Product test not found!');
            return 1;
        }
        
        $this->info('Product found: ' . $product->name);
        $this->info('Available colors: ' . $product->color);
        $this->info('Available sizes: ' . $product->size);
        
        // Create/get cart
        $cart = \App\Models\Cart::firstOrCreate(['session_id' => 'test-session']);
        $this->info('Cart ID: ' . $cart->id);
        
        // Test 1: Add product with Noir + 40
        $this->info('\n--- Test 1: Adding Noir + 40 ---');
        $cartItem1 = \App\Models\CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'color' => 'Noir',
            'size' => '40',
            'quantity' => 1
        ]);
        $this->info('✅ Added: Noir + 40 (ID: ' . $cartItem1->id . ')');
        
        // Test 2: Add same product with Blanc + 41
        $this->info('\n--- Test 2: Adding Blanc + 41 ---');
        $cartItem2 = \App\Models\CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'color' => 'Blanc',
            'size' => '41',
            'quantity' => 2
        ]);
        $this->info('✅ Added: Blanc + 41 (ID: ' . $cartItem2->id . ')');
        
        // Test 3: Add same product with Rouge + 42
        $this->info('\n--- Test 3: Adding Rouge + 42 ---');
        $cartItem3 = \App\Models\CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'color' => 'Rouge',
            'size' => '42',
            'quantity' => 1
        ]);
        $this->info('✅ Added: Rouge + 42 (ID: ' . $cartItem3->id . ')');
        
        // Test 4: Try to add same spec again (should increase quantity)
        $this->info('\n--- Test 4: Adding same spec (Noir + 40) again ---');
        $existingItem = \App\Models\CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->where('color', 'Noir')
            ->where('size', '40')
            ->first();
        
        if ($existingItem) {
            $existingItem->quantity++;
            $existingItem->save();
            $this->info('✅ Updated quantity for Noir + 40: ' . $existingItem->quantity);
        }
        
        // Display cart contents
        $this->info('\n=== CART CONTENTS ===');
        $cart->load('cartItems.product');
        
        foreach ($cart->cartItems as $item) {
            $this->info('Product: ' . $item->product->name);
            $this->info('  Color: ' . $item->color);
            $this->info('  Size: ' . $item->size);
            $this->info('  Quantity: ' . $item->quantity);
            $this->info('  Unit Price: €' . number_format($item->unit_price, 2));
            $this->info('  Subtotal: ' . $item->formatted_subtotal);
            $this->info('---');
        }
        
        $this->info('Total items: ' . $cart->cartItems->count());
        $this->info('Total quantity: ' . $cart->cartItems->sum('quantity'));
        $this->info('Cart total: €' . number_format($cart->total, 2));
        
        $this->info('\n✅ Multi-specification cart test completed successfully!');
        return 0;
    }
}
