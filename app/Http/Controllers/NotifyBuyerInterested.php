<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use App\Notifications\BuyerInterestedProduct;

class NotifyBuyerInterested extends Controller
{
    public function notify($Uid, $Pid)
    {
        $user         = User::find($Uid);
        $product      = Product::find($Pid);
        $notification = new BuyerInterestedProduct($user, $product);
        $user->notify($notification);

        $notificationData = $notification->toArray(null);

        return response()->json($notificationData, 200);
    }

}
