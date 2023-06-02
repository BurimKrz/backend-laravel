<?php
namespace App\Services;
use Illuminate\Support\Facades\DB;

class NotificationService
{

    public function notification($id)
    {
        $notifications = DB::table('notifications')
            ->where('notifiable_id', $id)
            ->get();

        return response()->json($notifications, 200);

        if (!$notifications) {
            return response()->json(['error' => 'Notification not found'], 404);
        }
    }
}
