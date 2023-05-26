<?php
namespace App\Services\Services;
use App\Models\product;
use App\Models\product_category;
use App\Services\Interfaces\FilterProductInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class FilterProductService implements FilterProductInterface{

    public function filterProduct($id){
        $productCategory = product_category::find($id);

        if (!$productCategory) {
            return new JsonResponse(['message' => 'Not found'], 404);
        }

        $productCategory = Product::select('product.name', 'product.description', 'product.price', 'product.imageURL', 'company.name as company', 'company.country as country')
            ->join('product_category', 'product_category.id', '=', 'product.category_id')
            ->join('company', 'company.id', '=', 'product.company_id')
            ->where('product_category.id', $id)
            ->get();

        return $productCategory;
    }
}