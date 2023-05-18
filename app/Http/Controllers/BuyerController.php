<?php

namespace App\Http\Controllers;

use App\Models\buyerConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BuyerController extends Controller
{
    public function buyerConfirmation(Request $request)
    {

        $validated = Validator::make(
            $request->all(),
            [
                'user_id'      => 'required|integer',
                'product_id'   => 'required|integer',
                'confirmation' => 'required|boolean:true, false',
            ]
        );
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 400);
        }

        $buyer = BuyerConfirmation::create(
            [
                'user_id'      => $request->user_id,
                'product_id'   => $request->product_id,
                'confirmation' => $request->confirmation,
            ]
        );
        return response()->json(['buyer' => $buyer], 201);
    }
}
