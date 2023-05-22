<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifyItemRequest;
use App\Models\product;
use Illuminate\Http\Request;

class ModifyItem extends Controller
{
    public function update(ModifyItemRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product = new Product($request->validated());
        return response()->json(['product' => $product]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted");
    }
}
