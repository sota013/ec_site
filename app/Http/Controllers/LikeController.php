<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function store($id)
    {
        Like::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $id,
        ]);

        return redirect()->route('products.show', $id);
    }
}
