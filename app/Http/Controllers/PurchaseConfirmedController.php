<?php

namespace App\Http\Controllers;

use App\Models\buySell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchaseConfirmedController extends Controller
{
    public function purchaseConfirmed(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'user_id'    => 'required|integer',
                'product_id' => 'required|integer',
                'action'     => 'required|in:buy',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $buy = BuySell::create(
            [
                'user_id'    => $request->user_id,
                'product_id' => $request->product_id,
                'action'     => $request->action,
            ]
        );

        return response()->json(['buy' => $buy], 201);
    }
}
