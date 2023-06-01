<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerRequest;
use App\Http\Requests\InterestedInRequest;
use App\Interfaces\BuyerInterface;
use App\Interfaces\InterestedInterface;

class BuyerController extends Controller
{

    private BuyerInterface $buyerInterface;

    public function __construct(BuyerInterface $buyerInterface)
    {
        $this->buyerInterface = $buyerInterface;
    }
    public function buyerConfirmation(BuyerRequest $buyerRequest, BuyerInterface $buyerInterface,
        InterestedInterface $interestedInterface, InterestedInRequest $interestedInRequest) {

        $buyer = $this->buyerInterface->createBuyer($buyerRequest);

        $confirm = $buyerRequest->confirmation;
        if ($confirm === true) {

            $interestedInterface->createInterestedIn($interestedInRequest);
        }
        return response()->json(['buyer' => $buyer, $confirm], 201);
    }
}
