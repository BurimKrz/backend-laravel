<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Models\sellerConfirmation;
use App\Models\transaction;

class SellerController extends Controller
{
    public function sellConfirmation(SellerRequest $request)
    {

        SellerConfirmation::create(
            [
                'company_id'   => $request->company_id,
                'product_id'   => $request->product_id,
                'buyer_id'     => $request->buyer_id,
                'confirmation' => $request->confirmation,
            ]
        );

        if ($request->confirmation === true) {

            $transaction = new Transaction($request->validated());
        }
        return response($transaction);

    }
}
