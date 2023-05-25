<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ListNotificationsController extends Controller
{
    public function findNotifications($id)
    {
        $notifications = DB::table('notifications')
            ->where('notifiable_id', $id)
            ->get();

        return $notifications;
        if (!$notifications) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

    }
}
