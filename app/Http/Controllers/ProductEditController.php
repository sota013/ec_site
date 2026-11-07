<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductEditController extends Controller
{
    public function edit($id)
    {
        $product = Product::where('user_id', auth()->id())
            ->findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('user_id', auth()->id())
            ->findOrFail($id);

        $validated = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'img_path' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        if ($request->hasFile('img_path')) {
            $imagePath = $request->file('img_path')
                ->store('products', 'public');

            $validated['img_path'] = $imagePath;
        } else {
            unset($validated['img_path']);
        }

        $product->update($validated);

        return redirect()->route('mypage')
            ->with('success', '商品を更新しました。');
    }
}
