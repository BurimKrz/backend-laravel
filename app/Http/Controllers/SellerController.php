<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\sellerConfirmation;

class SellerController extends Controller
{
    public function sellConfirmation(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'company_id'   => 'required|integer',
                'product_id'   => 'required|integer',
                'buyer_id'     => 'required|integer',
                'confirmation' => 'required|boolean:true,false',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()]);
        }

        $seller = SellerConfirmation::create(
            [
                'company_id'   => $request->company_id,
                'product_id'   => $request->product_id,
                'buyer_id'     => $request->buyer_id,
                'confirmation' => $request->confirmation,
            ]
        );

        return response('Sell confirmation recorded successfully.');
    }
}
