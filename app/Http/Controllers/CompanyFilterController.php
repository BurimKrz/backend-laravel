<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\company_category;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompanyFilterController extends Controller
{
    public function filterCompany($id)
    {
        $companyCategory = Company_category::find($id);

        if (!$companyCategory) {
            return new JsonResponse(['message' => 'Not found']);
        }

        $companies = Company::select('company.name', 'company.keywords', 'company.country', 'company.web_address', 'company.more_info', 'company.type')
            ->join('company_categories', 'company_categories.id', '=', 'company.category_id')
            ->where('company_categories.id', '=', $id)
            ->get();

        return $companies;
    }
}
