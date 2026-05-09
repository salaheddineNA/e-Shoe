<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private function getCart()
    {
        $sessionId = Session::getId();
        return Cart::firstOrCreate(['session_id' => $sessionId]);
    }

    public function index()
    {
        $cart = $this->getCart();
        $cart->load('cartItems.product');
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $productId)
    {
        try {
            $product = Product::findOrFail($productId);
            
            if ($product->stock_quantity < 1) {
                return back()->with('error', 'Ce produit est en rupture de stock.');
            }

            $cart = $this->getCart();
            
            // Get selected color and size from request
            $color = $request->input('color');
            $size = $request->input('size');
            $quantity = $request->input('quantity', 1);
            
            // Log for debugging
            \Log::info('Adding to cart', [
                'product_id' => $productId,
                'color' => $color,
                'size' => $size,
                'quantity' => $quantity
            ]);
            
            // Normalize color and size values
            $color = $color ? trim($color) : null;
            $size = $size ? trim($size) : null;
            
            // Validate color if product has colors and color is provided
            if ($product->color && $color) {
                $availableColors = array_map('trim', explode(',', $product->color));
                if (!in_array($color, $availableColors)) {
                    return back()->with('error', 'Couleur sélectionnée invalide.');
                }
            }
            
            // Validate size if product has sizes and size is provided
            if ($product->size && $size) {
                $availableSizes = array_map('trim', explode(',', $product->size));
                if (!in_array($size, $availableSizes)) {
                    return back()->with('error', 'Pointure sélectionnée invalide.');
                }
            }
            
            // Set default values if product doesn't have colors/sizes
            if (!$product->color) {
                $color = null;
            }
            if (!$product->size) {
                $size = null;
            }
            
            // Check if same product with same color/size already exists in cart
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->where('color', $color)
                ->where('size', $size)
                ->first();

            if ($cartItem) {
                if ($cartItem->quantity >= $product->stock_quantity) {
                    return back()->with('error', 'Stock insuffisant pour ce produit.');
                }
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $productId,
                    'color' => $color,
                    'size' => $size,
                    'quantity' => $quantity
                ]);
            }

            return back()->with('success', 'Produit ajouté au panier!');
        } catch (\Exception $e) {
            \Log::error('Error adding to cart', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    public function update(Request $request, $cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $quantity = $request->quantity;

        if ($quantity > $cartItem->product->stock_quantity) {
            return back()->with('error', 'Stock insuffisant pour ce produit.');
        }

        if ($quantity <= 0) {
            $cartItem->delete();
        } else {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return back()->with('success', 'Panier mis à jour!');
    }

    public function remove($cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->delete();
        return back()->with('success', 'Produit retiré du panier!');
    }
}
