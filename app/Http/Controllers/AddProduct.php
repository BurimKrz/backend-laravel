<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Interfaces\ProductInterface;

class AddProduct extends Controller
{
    private ProductInterface $prductInterface;

    public function __construct(ProductInterface $ProductInterface){
        $this->prductInterface = $ProductInterface;
    }
    public function AddProduct(AddProductRequest $addProductRequest, ProductInterface $ProductInterface)
    {
        return response()->json($this->prductInterface->createProduct($addProductRequest), 200);

    }
}
