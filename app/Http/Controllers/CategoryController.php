<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    private CategoryInterface $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface){
        $this->categoryInterface = $categoryInterface;
    }
    public function category()
    {
        return response()->json($this->categoryInterface->companyCategory(),200);
    }
    public function subcategory()
    {
        return response()->json($this->categoryInterface->companySubcategory(), 200);
    }
    public function productcategory()
    {
        return response()->json($this->categoryInterface->productCategory(), 200);
    }
}
