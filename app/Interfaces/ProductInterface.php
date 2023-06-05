<?php
namespace App\Interfaces;
use App\Models\ImportProduct;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use App\Models\ExportProduct;

interface ProductInterface{

    public function createProduct(AddProductRequest $addProductRequest):Product;
    public function createExportProduct(AddProductRequest $addProductRequest): ExportProduct;
    public function createImportProduct(AddProductRequest $addProductRequest): ImportProduct;


}