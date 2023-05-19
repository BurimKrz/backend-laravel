<?php

namespace App\Http\Controllers;

use App\Models\interestedAt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InterestedProductController extends Controller
{
    public function interestedAt(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_id' => 'required|integer',
                'user_id'    => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

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
