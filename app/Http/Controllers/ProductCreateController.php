<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductCreateController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'img_path' => ['nullable', 'string', 'max:255'],
        ]);

        Product::create([
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company_id,
            'product_name' => $validated['product_name'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'description' => $validated['description'],
            'img_path' => $validated['img_path'] ?? null,
        ]);

        return redirect()
            ->route('mypage')
            ->with('success', '商品を登録しました。');
    }
}
