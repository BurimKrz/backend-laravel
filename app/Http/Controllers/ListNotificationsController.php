<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;

class ListNotificationsController extends Controller
{
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    public function findNotifications(NotificationService $notificationService, $id)
    {
        return response()->json($this->notificationService->notification($id), 200);
    }
}
