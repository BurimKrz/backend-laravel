<?php

namespace App\Http\Controllers;

use App\Models\corporate;

class CorporateController extends Controller
{
    public function showCorporate()
    {
        $corporate = Corporate::join('company', 'corporate.company_id', '=', 'company.id')
            ->select('company.name', 'company.keywords', 'company.country', 'company.web_address', 'company.more_info',
                'corporate.short_history', 'corporate.mission', 'corporate.version', 'corporate.responsibility', 'corporate.export_stories')
            ->get();
        return response()->json($corporate);
    }
}
