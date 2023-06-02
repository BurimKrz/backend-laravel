<?php
namespace App\Services;

use App\Models\corporate;

class CorporateService
{
    public function coroprate($id)
    {

        $corporate = Corporate::join('company', 'corporate.company_id', '=', 'company.id')
            ->select('company.name', 'company.keywords', 'company.country', 'company.web_address', 'company.more_info',
                'corporate.company_id', 'corporate.mission', 'corporate.vision', 'corporate.responsibility', 'corporate.export_stories')
            ->where('company.id', '=', $id)
            ->get();

            return $corporate;
    }
}
