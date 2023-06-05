<?php
namespace App\Implementations;

use App\Http\Requests\InterestedInRequest;
use App\Interfaces\InterestedInterface;
use App\Models\InterestedIn;

class InterestedInImplementation implements InterestedInterface
{
    public function createInterestedIn(InterestedInRequest $interestedInRequest): InterestedIn
    {

        return InterestedIn::create(
            [
                'buyer_id'   => $interestedInRequest['buyer_id'],
                'product_id' => $interestedInRequest['product_id'],
                'company_id' => $interestedInRequest['company_id'],
            ]
        );

    }

    public function delete($id)
    {
        $product = InterestedIn::findOrFail($id);
        $product->delete();
        return "Product deleted from list";
    }
}
