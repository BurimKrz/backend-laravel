<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\export_product;
use App\Models\import_product;
use App\Services\Interfaces\AddExportInterface;
use App\Services\Interfaces\AddImportInterface;
use App\Services\Interfaces\AddProductInterface;

class AddProduct extends Controller
{
    public function AddProduct(AddProductRequest $addProductRequest, AddImportInterface $addImportInterface,
    AddExportInterface $addExportInterface, AddProductInterface $addProductInterface)
    {
        return response()->json(($addProductInterface->createProduct($addProductRequest, $addImportInterface, $addExportInterface)), 200);

    }
}
