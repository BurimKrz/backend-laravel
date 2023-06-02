<?php
namespace App\Services;
 
use App\Models\Company;
use App\Models\CompanyCategory;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompanyFilterService
{
    public function companyFilter($id)
    {

        $companyCategory = CompanyCategory::find($id);

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
