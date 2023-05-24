<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerRequest;
use App\Http\Requests\InterestedInRequest;
use App\Models\buyerConfirmation;
use App\Services\BuyerService;
use App\Services\Interfaces\BuyerInterface;
use App\Services\Interfaces\InterestedInterface;
use App\Services\Services\InterestedInService;

class BuyerController extends Controller
{
    public function buyerConfirmation(BuyerRequest $buyerRequest, BuyerInterface $buyerInterface,
        InterestedInterface $interestedInterface, InterestedInRequest $interestedInRequest) {
        
        $buyer = $buyerInterface->createBuyer($buyerRequest);

        $confirm = $buyerRequest->confirmation;
        if ($confirm === true) {

            $interestedInterface->createInterestedIn($interestedInRequest);
        }
        return response()->json(['buyer' => $buyer, $confirm], 201);
    }
}
