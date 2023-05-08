<?php

namespace App\Http\Controllers;
use App\Models\company;
use App\Http\Resources\CompanyListResource;
use Illuminate\Http\Request;

class CompanyListController extends Controller
{
    function companyList () {
    return CompanyListResource::collection(company::all());
    }
}