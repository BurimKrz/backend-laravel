<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\company_category;
use App\Services\Interfaces\CompanyFilterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompanyFilterController extends Controller
{
    public function filterCompany(CompanyFilterInterface $companyFilterInterface, $id)
    {
       return response()->json($companyFilterInterface->companyFilter($id));
    }
}
