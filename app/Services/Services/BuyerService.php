<?php
namespace App\Services\Services;

use App\Http\Requests\BuyerRequest;
use App\Models\buyerConfirmation;
use App\Services\Interfaces\BuyerInterface;

class BuyerService implements BuyerInterface
{

    public function createBuyer(BuyerRequest $buyerRequest): BuyerConfirmation
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
