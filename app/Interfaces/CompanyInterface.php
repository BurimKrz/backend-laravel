<?php

namespace App\Interfaces;
use App\Http\Requests\CompanyRequest;
use App\Models\company;

interface CompanyInterface{

    public function createCompany(CompanyRequest $companyRequest, $userId):Company;
}
