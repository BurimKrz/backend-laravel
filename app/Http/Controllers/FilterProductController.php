<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\product_category;
use App\Models\productSubcategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FilterProductController extends Controller
{
    function filterProductCategory($id){
        $productCategory = product_category::find($id);

        if(!$productCategory){
            return new JsonResponse(['message'=>'Not found'], 404);
        }

        $productCategory = Product::select('product.name', 'product.description',   'product.price', 'product.imageURL', 'company.name as company', 'company.country as country')
            ->join('product_category', 'product_category.id', '=', 'product.category_id')
            ->join('company', 'company.id', '=', 'product.company_id')
            ->where('product_category.id', $id)
            ->get();

        return $productCategory;
    }
     function filterProductSubCategory($category_id, $subcategory_id){
        $products = Product::select('product.name', 'product.description', 'product.price', 'product.imageURL', 'company.name as company', 'company.country as country')
        ->join('product_subcategory', 'product.subcategory_id', '=', 'product_subcategory.id')
        ->join('product_category', 'product_subcategory.category_id', '=', 'product_category.id')
        ->join('company', 'company.id', '=', 'product.company_id')
        ->where('product.category_id', $category_id,)
        ->where('product.subcategory_id', $subcategory_id)
        ->get();

    return response()->json($products);
     }
}