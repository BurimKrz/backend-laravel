<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestedAtRequest;
use App\Models\interestedAt;

class InterestedProductController extends Controller
{
    public function interestedAt(InterestedAtRequest $request)
    {

        $interestedAt = InterestedAt::create([
            'product_id' => $request->product_id,
            'user_id'    => $request->user_id,
        ]);

        return response()->json(['interestedAt' => $interestedAt], 200);
    }

    public function interestedProduct($id)
    {
        $interestedProduct = InterestedAt::join('product', 'interested_at.product_id', '=', 'product.id')
            ->join('users', 'interested_at.user_id', '=', 'users.id')
            ->select('product.name', 'product.description', 'product.price')
            ->where('users.id', '=', $id)
            ->get();

        return response()->json($interestedProduct);
    }

    public function deleteInterestedAT($id)
    {
        $product = InterestedAt::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted");
    }
}
