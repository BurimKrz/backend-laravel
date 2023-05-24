<?php
namespace App\Services\Services;

use App\Http\Requests\InterestedInRequest;
use App\Models\interestedIn;
use App\Services\Interfaces\InterestedInterface;

class InterestedInService implements InterestedInterface
{

    public function createInterestedIn(InterestedInRequest $interestedInRequest): interestedIn
    {

        return interestedIn::create(
            [
                'buyer_id'   => $interestedInRequest['buyer_id'],
                'product_id' => $interestedInRequest['product_id'],
                'company_id' => $interestedInRequest['company_id'],
            ]
        );
      
    }
}
