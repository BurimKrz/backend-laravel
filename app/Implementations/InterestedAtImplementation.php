<?php
namespace App\Implementations;

use App\Http\Requests\InterestedAtRequest;
use App\Interfaces\InterestedAtInterface;
use App\Models\interestedAt;

class InterestedAtImplementation implements InterestedAtInterface
{
    public function createInterestedAt(InterestedAtRequest $interestedAtRequest): interestedAt
    {
        return interestedAt::create(
            [
                'product_id' => $interestedAtRequest['product_id'],
                'user_id'    => $interestedAtRequest['user_id'],
            ]
        );

    }
    public function delete($id)
    {
        $product = InterestedAt::findOrFail($id);
        $product->delete();
        return"Product deleted";

    }
}
