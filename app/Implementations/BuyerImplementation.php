<?php
namespace App\Implementations;
use App\Http\Requests\BuyerRequest;
use App\Interfaces\BuyerInterface;
use App\Models\buyerConfirmation;


class BuyerImplementation implements BuyerInterface{

    public function createBuyer(BuyerRequest $buyerRequest): buyerConfirmation
    {
        return BuyerConfirmation::create(
            [
                'user_id'      => $buyerRequest['user_id'],
                'product_id'   => $buyerRequest['product_id'],
                'confirmation' => $buyerRequest['confirmation'],
            ]
        );

    }
}