<?php
namespace App\Services;

use App\Models\interestedIn;

class InterestedInService 
{
    public function showInterestedIn($id)
    {
        $interested_in = InterestedIn::join('product', 'product.id', '=', 'interested_in.product_id')
            ->join('buyer_confirm', 'buyer_confirm.id', '=', 'interested_in.buyer_id')
            ->join('company', 'company.id', '=', 'interested_in.company_id')
            ->join('users', 'users.id', '=', 'buyer_confirm.user_id')
            ->select('product.id', 'buyer_confirm.id', 'company.id', 'product.name', 'product.description', 'product.price', 'users.name as user_name', 'users.surname as user_surname')
            ->where('company.id', '=', $id)
            ->get();

        return $interested_in;
    }


}
