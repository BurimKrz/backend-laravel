<?php

namespace App\Http\Controllers;

use App\Models\product;

class ViewController extends Controller
{
    public function view($id)
    {
        $product = Product::find($id);
        $views   = $product->views;
        if ($product) {
            $product->increment('views');
            return response()->json(['views' => $views]);
        } else {
            return response()->json(['views' => $views]);
        }
        // $views = $product ? $product->views : null;
        // return response()->json(['views' => $views]);
    }

    public function date($id)
    {
        $product = Product::find($id);
        $created = $product ? $product->created_at : null;
        return response()->json(['created_at' => $created]);
    }
}
