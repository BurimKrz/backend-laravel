<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\activity_company;
use App\Services\Interfaces\ActivityInterface;

class ActivityController extends Controller
{
    public function activitycontroller(ActivityRequest $activityRequest, ActivityInterface $activityInterface)
    {
    
        return response()->json($activityInterface->activity($activityRequest));
    }
}
