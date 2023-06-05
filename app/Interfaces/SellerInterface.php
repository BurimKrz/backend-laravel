<?php
namespace App\Interfaces;
use App\Http\Requests\SellerRequest;


interface SellerInterface{

    public function confirmSell(SellerRequest $sellerRequest);
}