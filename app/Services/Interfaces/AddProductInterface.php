<?php
namespace App\Services\Interfaces;

use App\Http\Requests\AddProductRequest;
use App\Services\Interfaces\AddExportInterface;
use App\Services\Interfaces\AddImportInterface;


interface AddProductInterface{

    public function createProduct(AddProductRequest $addProductRequest,
    AddImportInterface $addImportInterface, AddExportInterface $addExportInterface): product;
  

}