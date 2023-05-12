<?php

namespace App\Http\Controllers;
use App\Models\company;
use App\Http\Resources\CompanyListResource;
use App\Http\Resources\CompanyDetailsResource;
use Illuminate\Http\Request;

class CompanyListController extends Controller
{
    function companyList () {
    return CompanyListResource::collection(Company::all());
    }

    public function  companyDetails($id){

        $company_details = Company::find($id)
        ->join('company_categories as cc', 'company.category_id', '=', 'cc.id')
        ->join('company_subcategories as cs', 'company.subcategory_id', '=', 'cs.id')
        ->where('company.id', '=', $id)
        ->select('company.id', 'company.name', 'company.keywords', 'company.country',
                    'company.web_address', 'company.more_info', 'company.profile_picture', 'company.membership', 'cc.name as category', 'cs.name as subcategory')
        ->get();

        return CompanyDetailsResource::collection($company_details);
    }
}
