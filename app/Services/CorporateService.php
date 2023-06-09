<?php
namespace App\Services;

use App\Models\Corporate;

class CorporateService
{
    public function coroprate($id)
    {

        $corporate = Corporate::join('company', 'corporate.company_id', 'company.id')
            ->where('company.id', $id)
            ->get(['company.name', 'company.keywords', 'company.country', 'company.web_address', 'company.more_info',
            'corporate.company_id', 'corporate.mission', 'corporate.vision', 'corporate.responsibility', 'corporate.export_stories']);

            return $corporate;
    }
}
