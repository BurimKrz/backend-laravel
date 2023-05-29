<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyDetailsResource;
use App\Http\Resources\CompanyListResource;
use App\Models\company;
use App\Services\Interfaces\CompanyListInterface;

class CompanyListController extends Controller
{
    public function companyList()
    {
        return CompanyListResource::collection(Company::all());
    }

    public function companyDetails(CompanyListInterface $companyListInterface, $id)
    {
       return response()->json([$companyListInterface->detailsOfCompany($id)], 200);
    }
}
