<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    function activitycontroller(Request $request){
        $validator = Validator::make(
            $request -> all(),
            [
                'activity_area_id'=> 'required|integer',
                'company_id'=> 'required|integer',
            ]
            );
    }
}
