<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000'
        ]);

        $product = Product::findOrFail($productId);

        // Check if user already reviewed this product
        $existingReview = Review::where('product_id', $productId)
            ->where('customer_email', $request->customer_email)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'Vous avez déjà donné votre avis sur ce produit.');
        }

        $review = Review::create([
            'product_id' => $productId,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => false // Reviews need admin approval
        ]);

        return back()->with('success', 'Merci pour votre avis ! Il sera publié après validation.');
    }
}
