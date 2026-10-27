<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::when($keyword, function ($query, $keyword) {
            $query->where('product_name', 'like', '%' . $keyword . '%');
        })->get();

        return view('products.index', compact('products', 'keyword'));
    }
}
