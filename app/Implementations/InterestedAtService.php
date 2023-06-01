<?php
namespace App\Services\Services;

use App\Http\Requests\InterestedAtRequest;
use App\Models\interestedAt;
use App\Services\Interfaces\InterestedAtInterface;

class InterestedAtService implements InterestedAtInterface
{

    public function createInterestedAt(InterestedAtRequest $interestedAtRequest): interestedAt
    {

        return interestedAt::create(
            [
                'product_id' => $interestedAtRequest['product_id'],
                'user_id'    => $interestedAtRequest['user_id'],
                'company_id'    => $interestedAtRequest['company_id'],
            ]
        );

    }

    public function selectInterstedProduct($id): interestedAt
    {
        return InterestedAt::join('product', 'interested_at.product_id', '=', 'product.id')
            ->join('users', 'interested_at.user_id', '=', 'users.id')
            ->select('product.name', 'product.description', 'product.price')
            ->where('users.id', '=', $id)
            ->get();
    }

    public function delete($id)
    {
        $product = InterestedAt::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted");

    }

}
