<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerRequest;
use App\Models\buyerConfirmation;
use App\Models\interestedIn;

class BuyerController extends Controller
{
    public function buyerConfirmation(BuyerRequest $request)
    {

        $buyer = BuyerConfirmation::create(
            [
                'user_id'      => $request->user_id,
                'product_id'   => $request->product_id,
                'confirmation' => $request->confirmation,
            ]
        );

        $add  = $request->confirmation;
        if ($add === true) {

            interestedIn::create(
                [
                    'buyer_id'   => $request->buyer_id,
                    'product_id' => $request->product_id,
                    'company_id' => $request->company_id,
                ]
            );

        }
        return response()->json(['buyer' => $buyer, $add], 201);
    }
}
