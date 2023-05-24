<?php
namespace App\Services\Interfaces;

use App\Http\Requests\CompanyRequest;
use App\Models\company;

interface CompanyInterface{

    public function createCompany(CompanyRequest $companyRequest): Company;

}