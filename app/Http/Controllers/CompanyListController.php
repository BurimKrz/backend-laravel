<?php

namespace App\Http\Controllers;

use App\Interfaces\CompanyInterface;
use App\Services\CompanyListService;

class CompanyListController extends Controller
{
    private CompanyListService $companyListService;
    private CompanyInterface $companyInterface;

    public function __construct(CompanyListService $companyListService, CompanyInterface $companyInterface){
        $this->companyListService = $companyListService;
        $this->companyInterface = $companyInterface;
    }
    public function companyList()
    {
        return response()->json($this->companyInterface->companyList(), 200);
    }

    public function companyDetails(CompanyListService $companyListService, $id)
    {
       return response()->json($this->companyListService->detailsOfCompany($id), 200);
    }
}
