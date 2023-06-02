<?php
namespace App\Services;

use App\Models\Product;
use App\Models\User;
use App\Notifications\BuyerInterestedProduct;

class NotifyBuyerService
{
    public function notifyBuyer($Oid, $Uid, $Pid)
    {
        $Owner   = User::find($Oid);
        $user    = User::find($Uid);
        $product = Product::find($Pid);
        if ($user && $product) {
            $notification = new BuyerInterestedProduct($Owner, $user, $product);
            $Owner->notify($notification);

            $notificationData = $notification->toArray($Owner);

            return response()->json($notificationData, 200);
        } else if (!$user) {

            return response()->json(['error' => 'User not found'], 404);
        } else if (!$product) {

            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
