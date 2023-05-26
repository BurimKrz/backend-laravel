<?php
namespace App\Services\Interfaces;

use App\Http\Requests\AddProductRequest;
use App\Models\export_product;

interface AddExportInterface{


    public function createExportProduct(AddProductRequest $addProductRequest): Export_product;

}