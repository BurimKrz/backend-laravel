<?php
namespace App\Services;

use App\Http\Requests\ActivityRequest;
use App\Models\ActivityCompany;

class ActivityService
{
    public function activity(ActivityRequest $activityRequest, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        
        $activityAreaId = strval($activityRequest->activity_area_id);

        $split = str_split($activityAreaId, 1);

        for ($i = 0; $i < count($split); $i++) {
            ActivityCompany::insert([
                'activity_area_id' => $split[$i],
                'company_id'       => 2,
            ]);
        }
        return response()->json(__('messages.successfully'));
    }

}
