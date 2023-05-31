<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestedAtRequest;

use App\Interfaces\InterestedAtInterface;
use App\Services\InterestedAtService;

class InterestedProductController extends Controller
{
    private InterestedAtInterface $interestedAtInterface;
    private InterestedAtService $interestedAtService;
    public function __construct(InterestedAtInterface $interestedAtInterface, InterestedAtService $interestedAtService){
        $this->interestedAtInterface = $interestedAtInterface;
        $this->interestedAtService = $interestedAtService;
    }

    public function interestedAt( InterestedAtInterface $interestedAtInterface, InterestedAtRequest $interestedAtRequest)
    {
        return response()->json([$this->interestedAtInterface->createInterestedAt($interestedAtRequest)], 200);

    }

    public function interestedProduct(InterestedAtService $interestedAtService, $id)
    {
        return response()->json([$this->interestedAtService->selectInterstedProduct($id)], 200);
    }

    public function deleteInterestedAT(InterestedAtInterface $interestedAtInterface, $id)
    {
       return response()->json([$this->interestedAtInterface->delete($id)]);
    }
}
