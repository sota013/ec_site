<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductDetailController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $isLiked = auth()->check()
            && $product->likes()->where('user_id', auth()->id())->exists();

            return view('products.show', compact('product', 'isLiked'));
    }
}
