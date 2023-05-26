<?php
namespace App\Services\Services;

use App\Http\Requests\SellerRequest;
use App\Models\sellerConfirmation;
use App\Models\transaction;
use App\Services\Interfaces\SellerInterface;

class SellerService implements SellerInterface
{
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
        return response($transaction);
    }
}
