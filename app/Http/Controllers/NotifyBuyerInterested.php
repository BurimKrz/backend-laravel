<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use App\Notifications\BuyerInterestedProduct;

class NotifyBuyerInterested extends Controller
{
    public function notify($Uid, $Pid)
    {

        $user    = User::find($Uid);
        $product = product::find($Pid);
        $user->notify(new BuyerInterestedProduct($user, $product));
        return response()->json([$user, $product], 200);
    }
}
