<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Services\Interfaces\SellerInterface;

class SellerController extends Controller
{
    public function sellConfirmation(SellerRequest $sellerRequest, SellerInterface $sellerInterface)
    {

        return response()->json([$sellerInterface->confirmSell($sellerRequest)], 200);

    }
}
