<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompanyController extends Controller
{
    private CompanyInterface $companyInterface;

    public function __construct(CompanyInterface $companyInterface)
    {
        $this->companyInterface = $companyInterface;
    }
    public function company(CompanyRequest $companyRequest, $userId):JsonResponse
    {
        return response()->json($this->companyInterface->createCompany($companyRequest, $userId), 200);


    }
}
