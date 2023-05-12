<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductCategory;
use App\Models\company_category;
use App\Models\company_subcategory;
use App\Models\product_category;

class CategoryController extends Controller
{
    public function category()
    {
        return CategoryResource::collection(company_category::all());
    }
    public function subcategory()
    {
        return CategoryResource::collection(company_subcategory::all());
    }
    public function productcategory()
    {
        return ProductCategory::collection(product_category::all());
    }
}
