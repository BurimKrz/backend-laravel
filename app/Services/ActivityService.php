<?php
namespace App\Services;

use App\Http\Requests\ActivityRequest;
use App\Models\activity_company;
use App\Services\Interfaces\ActivityInterface;

class ActivityService
{
    public function activity(ActivityRequest $activityRequest)
    {

        $activityAreaId = strval($activityRequest->activity_area_id);

        $split = str_split($activityAreaId, 1);

        for ($i = 0; $i < count($split); $i++) {
            activity_company::insert([
                'activity_area_id' => $split[$i],
                'company_id'       => 2,
            ]);
        }
        return response()->json('ok');
    }

}
