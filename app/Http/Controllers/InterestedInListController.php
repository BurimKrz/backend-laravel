<?php

namespace App\Http\Controllers;

use App\Models\interestedIn;
use App\Services\Interfaces\InterestedInterface;

class InterestedInListController extends Controller
{

    public function interestedIn(InterestedInterface $interestedInterface, $id)
    {
        return response()->json([$interestedInterface->showInterestedIn($id)], 200);
    }

    public function destroy(InterestedInterface $interestedInterface, $id)
    {
        return response()->json([$interestedInterface->delete($id)], 200);
    }

}
