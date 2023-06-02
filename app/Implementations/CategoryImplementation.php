<?php
namespace App\Implementations;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductCategoryResource;
use App\Interfaces\CategoryInterface;
use App\Models\CompanyCategory;
use App\Models\CompanySubcategory;
use App\Models\ProductCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryImplementation implements CategoryInterface
{

    public function companyCategory(): JsonResource
    {
        return CategoryResource::collection(CompanyCategory::all());
    }

    public function companySubcategory(): JsonResource
    {
        return CategoryResource::collection(CompanySubcategory::all());

    }
    public function productCategory(): JsonResource
    {
        return ProductCategoryResource::collection(ProductCategory::all());
    }

}
