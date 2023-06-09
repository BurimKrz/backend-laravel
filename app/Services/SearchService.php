<?php
namespace App\Services;

use App\Http\Requests\SearchRequest;
use App\Models\Company;

class SearchService
{

    public function searchCompany(SearchRequest $search)
    {

        $companies = Company::where('name', 'like', '%' . $search ->search. '%')
            ->orWhere('keywords', 'like', '%' . $search -> search. '%')
            ->orWhere('country', 'like', '%' . $search ->search. '%')
            ->select()
            ->paginate(10);
            
        return $companies;
    }
}
