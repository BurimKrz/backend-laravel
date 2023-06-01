<?php
namespace App\Implementations;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductCategory;
use App\Interfaces\CategoryInterface;
use App\Models\company_category;
use App\Models\company_subcategory;
use App\Models\product_category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryImplementation implements CategoryInterface
{

    public function companyCategory(): JsonResource
    {
        return CategoryResource::collection(company_category::all());
    }

    public function companySubcategory(): JsonResource
    {
        return CategoryResource::collection(company_subcategory::all());

    }
    public function productCategory(): JsonResource
    {
        return ProductCategory::collection(product_category::all());
    }

}
