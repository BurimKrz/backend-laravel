<?php
namespace App\Interfaces;

use App\Http\Requests\BuyerRequest;
use App\Models\BuyerConfirmation;

interface BuyerInterface{

    public function createBuyer(BuyerRequest $buyerRequest): BuyerConfirmation;

}