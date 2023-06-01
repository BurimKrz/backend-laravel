<?php

namespace App\Http\Controllers;

use App\Models\userCompany;

class MailFormController extends Controller
{
    public function mailForm($id)
    {
        $formData = userCompany::join('company', 'user_company.company_id', '=', 'company.id')
            ->join('users', 'user_company.user_id', '=', 'users.id')
            ->join('product', 'product.company_id', '=', 'company.id')
            ->where('product.id', $id)
            ->select('product.id as Product_ID', 'company.id as Company_id', 'users.id as Owner_id', 'product.name as Product', 'users.email')
            ->get();

        return response()->json($formData, 200);
    }
}
