<?php
namespace App\Interfaces;
use App\Models\import_product;
use App\Models\product;
use App\Http\Requests\AddProductRequest;
use App\Models\export_product;

interface ProductInterface{

    public function createProduct(AddProductRequest $addProductRequest):Product;
    public function createExportProduct(AddProductRequest $addProductRequest): Export_product;
    public function createImportProduct(AddProductRequest $addProductRequest): import_product;


}