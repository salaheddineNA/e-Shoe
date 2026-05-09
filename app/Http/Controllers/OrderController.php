<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderController extends Controller
{
    public function create()
    {
        $cart = $this->getCart();
        $cart->load('cartItems.product');
        
        if ($cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide!');
        }
        
        return view('orders.create', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:1000'
        ]);

        $cart = $this->getCart();
        $cart->load('cartItems.product');

        if ($cart->cartItems->isEmpty()) {
            return back()->with('error', 'Votre panier est vide!');
        }

        DB::beginTransaction();
        try {
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'shipping_address' => $request->shipping_address,
                'total_amount' => $cart->total,
                'payment_method' => 'cash_on_delivery',
                'status' => 'pending',
                'notes' => $request->notes
            ]);

            foreach ($cart->cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product_name' => $cartItem->product->name,
                    'product_image' => $cartItem->product->image,
                    'product_brand' => $cartItem->product->brand,
                    'color' => $cartItem->color,
                    'size' => $cartItem->size,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                    'subtotal' => $cartItem->subtotal
                ]);

                $product = $cartItem->product;
                $product->stock_quantity -= $cartItem->quantity;
                $product->save();
            }

            CartItem::where('cart_id', $cart->id)->delete();

            DB::commit();

            return redirect()->route('orders.confirmation', $order->id)
                ->with('success', 'Commande passée avec succès!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    public function confirmation($orderId)
    {
        $order = Order::with('orderItems')->findOrFail($orderId);
        return view('orders.confirmation', compact('order'));
    }

    public function downloadProof($orderNumber)
    {
        $order = Order::with('orderItems')->where('order_number', $orderNumber)->firstOrFail();
        
        // Generate PDF from view
        $pdf = PDF::loadView('orders.order-proof', compact('order'));
        
        // Download the PDF with a descriptive filename
        return $pdf->download('preuve-commande-' . $orderNumber . '.pdf');
    }

    private function getCart()
    {
        $sessionId = Session::getId();
        return Cart::firstOrCreate(['session_id' => $sessionId]);
    }
}
