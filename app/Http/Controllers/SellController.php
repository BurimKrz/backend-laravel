<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\buySell;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function sellConfirmation(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id'    => 'required|integer',
                'product_id' => 'required|integer',
                'action'     => 'required|in:sell',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()]);
        }
        $sell = BuySell::create(
            [
                'user_id'    => $request->user_id,
                'product_id' => $request->product_id,
                'action'     => $request->action,
            ]
        );

        return response('Sell confirmation recorded successfully.');
    }
}
