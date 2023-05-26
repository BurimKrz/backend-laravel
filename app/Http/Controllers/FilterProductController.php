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
        return response()->json($filterProductInterface->filterProduct($id));
    }
    public function filterProductSubCategory($category_id, $subcategory_id)
    {
        $products = Product::select('product.name', 'product.description', 'product.price', 'product.imageURL', 'company.name as company', 'company.country as country')
            ->join('product_subcategory', 'product.subcategory_id', '=', 'product_subcategory.id')
            ->join('product_category', 'product_subcategory.category_id', '=', 'product_category.id')
            ->join('company', 'company.id', '=', 'product.company_id')
            ->where('product.category_id', $category_id, )
            ->where('product.subcategory_id', $subcategory_id)
            ->get();

        return response()->json($products);
    }
}
