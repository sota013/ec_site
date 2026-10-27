<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;

class MyPageController extends Controller
{
    public function index()
    {
        // 自分が出品した商品
        $products = Product::where('user_id', auth()->id())->get();
    
        // 自分が購入した商品
        $sales = Sale::with('product')
            ->where('user_id', auth()->id())
            ->get();
    
        // ログイン中のユーザー情報
        $user = auth()->user();
    
        return view('mypage', compact('products', 'sales', 'user'));
    }
}