<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_category;
use App\Services\Interfaces\FilterProductInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class FilterProductController extends Controller
{
    public function filterProductCategory(FilterProductInterface $filterProductInterface, $id)
    {
        return response()->json([$filterProductInterface->filterProduct($id)], 200);
    }
    public function filterProductSubCategory(FilterProductInterface $filterProductInterface, $category_id, $subcategory_id)
    {
       return response()->json([$filterProductInterface->filterSubcategory($subcategory_id, $category_id)], 200);
    }
}
