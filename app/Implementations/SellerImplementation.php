<?php
namespace App\Implementations;
use App\Http\Requests\SellerRequest;
use App\Interfaces\SellerInterface;
use App\Models\SellerConfirmation;
use App\Models\Transaction;

class SellerImplementation implements SellerInterface{

    public function confirmSell(SellerRequest $sellerRequest)
    {
        SellerConfirmation::create(
            [
                'company_id'   => $sellerRequest->company_id,
                'product_id'   => $sellerRequest->product_id,
                'buyer_id'     => $sellerRequest->buyer_id,
                'confirmation' => $sellerRequest->confirmation,
            ]
        );

        if ($sellerRequest->confirmation === true) {

            $transaction = new Transaction($sellerRequest->validated());
        }
        return $transaction;
    }
}