<?php
namespace App\Services;

use App\Models\product;
use App\Services\Interfaces\ViewInterface;

class ViewService
{

    public function views($id)
    {
        $product = Product::find($id);
        $views   = $product->views;
        if ($product) {
            $product->increment('views');
            return response()->json(['views' => $views]);
        } else {
            return response()->json(['views' => $views]);
        }
    }

    public function dateOfView($id)
    {
        $product = Product::find($id);
        $created = $product ? $product->created_at : null;
        return response()->json(['created_at' => $created]);
    }
}
