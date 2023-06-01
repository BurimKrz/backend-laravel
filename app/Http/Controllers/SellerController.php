<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Interfaces\SellerInterface;

class SellerController extends Controller
{
    private SellerInterface $sellerInterface;

    public function __construct(SellerInterface $sellerInterface){
        $this->sellerInterface = $sellerInterface;
    }
    public function sellConfirmation(SellerRequest $sellerRequest, SellerInterface $sellerInterface)
    {

        return response()->json([$this->sellerInterface->confirmSell($sellerRequest)], 200);

    }
}
