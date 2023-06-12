<?php

namespace App\Http\Controllers;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService){

        $this->productService = $productService;
    }

    public function products(){
        return $this->productService->productList();
    }
}
