<?php

namespace App\Http\Controllers;
use App\Models\company;
use App\Http\Resources\CompanyListResource;
use Illuminate\Http\Request;

class CompanyListController extends Controller
{
    function companyList () {
    return CompanyListResource::collection(Company::all());
    }

    public function  companyDetails($id){
           
        $company_details = Company::query()
        ->join('company_categories as cc', 'company.category_id', '=', 'cc.id')
        ->join('company_subcategories as cs', 'company.subcategory_id', '=', 'cs.id')
        ->where('company.id', '=', $id)
        ->select('company.id', 'company.name', 'company.keywords', 'company.country', 
                    'company.web_address', 'company.more_info', 'company.profile_picture', 'company.membership', 'cc.name', 'cs.name')
        ->get();

        return CompanyListResource::collection($company_details);
    }
}