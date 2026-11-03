<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function store($id)
    {
        $like = Like::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->first();
    
        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
            ]);
        }
    
        return redirect()->route('products.show', $id);
    }
}
