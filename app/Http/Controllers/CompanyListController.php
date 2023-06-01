<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyDetailsResource;
use App\Http\Resources\CompanyListResource;
use App\Interfaces\CompanyInterface;
use App\Models\company;
use App\Services\CompanyListService;
use App\Services\Interfaces\CompanyListInterface;

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
        return response()->json([$this->companyInterface->companyList()], 200);
    }

    public function companyDetails(CompanyListService $companyListService, $id)
    {
       return response()->json([$this->companyListService->detailsOfCompany($id)], 200);
    }
}
