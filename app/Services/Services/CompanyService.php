<?php
namespace App\Services\Services;

use App\Http\Requests\CompanyRequest;
use App\Models\company;
use App\Services\Interfaces\CompanyInterface;

class CompanyService implements CompanyInterface
{

    public function createCompany(CompanyRequest $companyRequest): Company
    {

        return Company::create(
            [
                'name'            => $companyRequest['name'],
                'keywords'        => $companyRequest['keywords'],
                'country'         => $companyRequest['country'],
                'web_address'     => $companyRequest['web_address'],
                'more_info'       => $companyRequest['more_info'],
                'budged'          => $companyRequest['budged'],
                'type'            => $companyRequest['type'],
                'taxpayer_office' => $companyRequest['taxpayer_office'],
                'TIN'             => $companyRequest['TIN'],
                'category_id'     => $companyRequest['category_id'],
                'subcategory_id'  => $companyRequest['subcategory_id'],
            ]
        );

    }
}
