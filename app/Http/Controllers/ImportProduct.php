<?php

namespace App\Http\Controllers;

use App\Services\ImportProductService;
use App\Services\Interfaces\ImportproductInterface;

class ImportProduct extends Controller
{
    private ImportProductService $importProductService;

    public function __construct(ImportProductService $importProductService){
        $this->importProductService = $importProductService;
    }

    public function import(ImportProductService $importProductService)
    {
        return response()->json([$this->importProductService->importProducts()], 200);
    }

    public function show(ImportProductService $importProductService, $id)
    {
        return response()->json([$this->importProductService->importProduct($id)], 200);
    }
}
