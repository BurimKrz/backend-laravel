<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\activity_company;

class ActivityController extends Controller
{
    public function activitycontroller(ActivityRequest $request)
    {
        $activityAreaId = strval($request->activity_area_id);

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
