<?php

namespace App\Http\Controllers;

use App\Services\CompanyFilterService;
use Illuminate\Support\Facades\App;

class CompanyFilterController extends Controller
{
    private CompanyFilterService $companyFilterService;

    public function __construct(CompanyFilterService $companyFilterService)
    {
        $this->companyFilterService = $companyFilterService;
    }
    public function filterCompany(CompanyFilterService $companyFilterService, $id, $languageId)
    {
        return response()->json($this->companyFilterService->companyFilter($id, $languageId), 200);
    }
}
