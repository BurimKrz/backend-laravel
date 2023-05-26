<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Interfaces\CompanyInterface;

class CompanyController extends Controller
{
    public function company(CompanyRequest $companyRequest,  $userId, CompanyInterface $companyInterface)
    {
        return response()->json([$companyInterface->createCompany($companyRequest, $userId)], 201);

    }
}
