<?php

namespace App\Http\Controllers;

use App\Services\NotifyBuyerService;

class NotifyBuyerInterested extends Controller
{
    private NotifyBuyerService $notifyBuyerService;
    public function __construct(NotifyBuyerService $notifyBuyerService)
    {
        $this->notifyBuyerService = $notifyBuyerService;
    }
    public function notify($Oid, $Uid, $Pid)
    {
        return $this->notifyBuyerService->notifyBuyer($Oid, $Uid, $Pid);
    }
}
