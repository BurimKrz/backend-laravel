<?php

namespace App\Http\Controllers;

use App\Services\FilterProductService;

class FilterProductController extends Controller
{
    private FilterProductService $filterProductService;

    public function __construct(FilterProductService $filterProductService){
        $this->filterProductService = $filterProductService;
    }
    public function filterProductCategory(FilterProductService $filterProductService, $id)
    {
        return response()->json($this->filterProductService->filterProduct($id), 200);
    }
    public function filterProductSubCategory(FilterProductService $filterProductService, $category_id, $subcategory_id)
    {
       return response()->json($this->filterProductService->filterSubcategory($category_id, $subcategory_id), 200);
    }
}
