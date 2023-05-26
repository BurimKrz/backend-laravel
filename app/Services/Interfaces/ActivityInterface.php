<?php
namespace App\Services\Interfaces;
use App\Http\Requests\ActivityRequest;


interface ActivityInterface{

    public function activity(ActivityRequest $activityRequest);
}