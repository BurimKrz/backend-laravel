<?php
namespace App\Services;

use App\Models\InterestedAt;

class InterestedAtService
{
    public function selectInterstedProduct($id)
    {
        $interestedAt = InterestedAt::join('product', 'interested_at.product_id', '=', 'product.id')
            ->join('users', 'interested_at.user_id', '=', 'users.id')
            ->select('product.name', 'product.description', 'product.price')
            ->where('users.id', '=', $id)
            ->get();
        return $interestedAt;
    }
}
