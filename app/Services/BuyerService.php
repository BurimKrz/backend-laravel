<?php
namespace App\Services;

use App\Http\Requests\BuyerRequest;
use App\Models\buyerConfirmation;

class BuyerService
{

    public function createBuyer(BuyerRequest $buyerRequest): BuyerConfirmation
    {
        $validatedData = $buyerRequest->validated();

        return BuyerConfirmation::create(
            [
                'user_id'      => $validatedData['user_id'],
                'product_id'   => $validatedData['product_id'],
                'confirmation' => $validatedData['confirmation'],
            ]
        );
    }
}
