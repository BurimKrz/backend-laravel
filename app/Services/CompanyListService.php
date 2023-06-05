<?php
namespace App\Services;

use App\Models\Company;

class CompanyListService
{

    public function detailsOfCompany($id)
    {
        $company_details = Company::join('company_categories as cc', 'company.category_id', '=', 'cc.id')
            ->join('company_subcategories as cs', 'company.subcategory_id', '=', 'cs.id')
            ->where('company.id', '=', $id)
            ->select('company.id', 'company.name', 'company.keywords', 'company.country',
                'company.web_address', 'company.more_info', 'company.profile_picture', 'company.membership', 'cc.name as category', 'cs.name as subcategory')
            ->get();

        return $company_details;

    }
}
