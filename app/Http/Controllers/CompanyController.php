<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Services\Interfaces\CompanyInterface;

class CompanyController extends Controller
{
    public function company(CompanyRequest $companyRequest, CompanyInterface $companyInterface)
    {
        return response()->json(($companyInterface->createCompany($companyRequest)), 201);

    }
}
