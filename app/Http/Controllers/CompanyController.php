<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function company(Request $request)
    {
      
        $company = Company::create([
            'name'            => $request->name,
            'keywords'        => $request->keywords,
            'country'         => $request->country,
            'web_address'     => $request->web_address,
            'more_info'       => $request->more_info,
            'budged'          => $request->budged,
            'type'            => $request->type,
            'taxpayer_office' => $request->taxpayer_office,
            'TIN'             => $request->TIN,
            'category_id'     => $request->category_id,
            'subcategory_id'  => $request->subcategory_id,
        ]);

        return response()->json(['company' => $company], 201);

    }
}
