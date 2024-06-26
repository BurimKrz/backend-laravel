<?php
namespace App\Services;

use App\Http\Requests\SearchRequest;
use App\Models\Company;
use App\Models\Product;

class SearchService
{

    public function searchCompany(SearchRequest $search)
    {

        return Company::where('company.name', 'like', '%' . $search->search . '%')
            ->orWhere('company.keywords', 'like', '%' . $search->search . '%')
            ->orWhere('company.country', 'like', '%' . $search->search . '%')
            ->join('company_categories as cc', 'company.category_id', 'cc.id')
            ->join('company_subcategories as cs', 'company.subcategory_id', 'cs.id')
            ->select(['company.id', 'company.name', 'company.keywords', 'company.country',
                'company.web_address', 'company.more_info', 'company.profile_picture', 'company.membership', 'cc.name as category', 'cs.name as subcategory'])
            ->paginate(10);

    }

    public function searchProduct(SearchRequest $search)
    {
        return Product::join('product_category as pc', 'product.category_id', 'pc.id')
            ->join('product_subcategory as ps', 'product.subcategory_id', 'ps.id')
            ->join('company as c', 'product.company_id', 'c.id')
            ->where('product.name', 'like', '%' . $search->search . '%')
            ->orWhere('pc.name', 'like', '%' . $search->search . '%')
            ->orWhere('ps.name', 'like', '%' . $search->search . '%')
            ->select(['product.name', 'product.description', 'product.price', 'product.type', 'pc.name as category', 'ps.name as subcategory', 'c.name as company'])
            ->paginate(10);
    }
}
