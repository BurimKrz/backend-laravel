<?php
namespace App\Services\Services;
use App\Models\company_category;
use App\Services\Interfaces\CompanyFilterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\company;

class CompanyFilterService implements CompanyFilterInterface{

    public function companyFilter($id){

        $companyCategory = company_category::find($id);

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