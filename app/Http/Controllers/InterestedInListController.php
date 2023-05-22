<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestedInRequest;
use App\Models\buyerConfirmation;
use App\Models\interestedIn;

class InterestedInListController extends Controller
{

    public function interestedIn($id)
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

    public function destroy($id)
    {

        $product = InterestedIn::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted from list");
    }

}
