<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
    
        $products = Product::query()
    
            ->when($keyword, function ($query, $keyword) {
                $query->where('product_name', 'like', '%' . $keyword . '%');
            })
    
            ->when($minPrice !== null && $minPrice !== '', function ($query) use ($minPrice) {
                $query->where('price', '>=', $minPrice);
            })
    
            ->when($maxPrice !== null && $maxPrice !== '', function ($query) use ($maxPrice) {
                $query->where('price', '<=', $maxPrice);
            })
    
            ->when(auth()->check(), function ($query) {
                $query->where('user_id', '!=', auth()->id());
            })
    
            ->orderBy('id', 'asc')
    
            ->get();
    
        return view('products.index', compact(
            'products',
            'keyword',
            'minPrice',
            'maxPrice'
        ));
    }
}
