<?php
namespace App\Implementations;

use App\Http\Requests\InterestedAtRequest;
use App\Interfaces\InterestedAtInterface;
use App\Models\InterestedAt;

class InterestedAtImplementation implements InterestedAtInterface
{
    public function createInterestedAt(InterestedAtRequest $interestedAtRequest): InterestedAt
    {
        return InterestedAt::create(
            [
                'product_id' => $interestedAtRequest['product_id'],
                'user_id'    => $interestedAtRequest['user_id'],
                'company_id' => $interestedAtRequest['company_id'],

            ]
        );

    }
    public function delete($id)
    {
        $product = InterestedAt::findOrFail($id);
        $product->delete();
        return "Product deleted";

    }
}
