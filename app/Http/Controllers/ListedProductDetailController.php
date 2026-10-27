<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ListedProductDetailController extends Controller
{
    public function show($id)
    {
        $product = Product::where('user_id', auth()->id())
            ->findOrFail($id);

        return view('products.listed-show', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::where('user_id', auth()->id())
            ->findOrFail($id);
    
        $product->delete();
    
        return redirect()
            ->route('mypage')
            ->with('success', '商品を削除しました。');
    }
}