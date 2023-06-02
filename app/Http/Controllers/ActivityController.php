<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;

use App\Services\ActivityService;


class ActivityController extends Controller
{
    private ActivityService $acticityService;

    public function __construct(ActivityService $acticityService){
        $this->acticityService = $acticityService;
    }
    public function activitycontroller(ActivityRequest $activityRequest)
    {
        return response()->json($this->acticityService->activity($activityRequest));
    }
}
