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

    public function showInterestedIn($id)
    {
        $interested_in = InterestedIn::join('product', 'product.id', '=', 'interested_in.product_id')
            ->join('buyer_confirm', 'buyer_confirm.id', '=', 'interested_in.buyer_id')
            ->join('company', 'company.id', '=', 'interested_in.company_id')
            ->join('users', 'users.id', '=', 'buyer_confirm.user_id')
            ->select('product.id', 'buyer_confirm.id', 'company.id', 'product.name', 'product.description', 'product.price', 'users.name as user_name', 'users.surname as user_surname')
            ->where('company.id', '=', $id)
            ->get();

        return response()->json($interested_in);
    }

    public function delete($id)
    {
        $product = InterestedIn::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted from list");

    }
}
