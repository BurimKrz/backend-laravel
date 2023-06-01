<?php
namespace App\Interfaces;

use App\Http\Requests\BuyerRequest;
use App\Models\buyerConfirmation;

interface BuyerInterface{

    public function createBuyer(BuyerRequest $buyerRequest): BuyerConfirmation;

}