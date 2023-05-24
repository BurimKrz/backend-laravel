<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestedAtRequest;
use App\Models\interestedAt;
use App\Services\Interfaces\InterestedAtInterface;

class InterestedProductController extends Controller
{
    public function interestedAt(InterestedAtRequest $interestedAtRequest, InterestedAtInterface $interestedAtInterface)
    {
        return response()->json(($interestedAtInterface->createInterestedAt($interestedAtRequest)), 200);

    }

    public function interestedProduct(InterestedAtInterface $interestedAtInterface, $id)
    {
        return response()->json(($interestedAtInterface->selectInterstedProduct($id)), 200);
    }

    public function deleteInterestedAT($id)
    {
        $product = InterestedAt::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted");
    }
}
