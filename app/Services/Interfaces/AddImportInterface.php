<?php
namespace App\Services\Interfaces;

use App\Http\Requests\AddProductRequest;
use App\Models\export_product;
use App\Models\import_product;

interface AddImportInterface{

    public function createImportProduct(AddProductRequest $addProductRequest): export_product;

}