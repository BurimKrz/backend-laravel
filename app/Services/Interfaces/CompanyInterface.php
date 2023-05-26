<?php
namespace App\Services\Interfaces;

use App\Http\Requests\CompanyRequest;

interface CompanyInterface{

    public function createCompany(CompanyRequest $companyRequest, $userId);

}