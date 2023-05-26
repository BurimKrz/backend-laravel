<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ImportproductInterface;

class ImportProduct extends Controller
{
    public function import(ImportproductInterface $importproductInterface)
    {
        return response()->json($importproductInterface->importProducts());
    }

    public function show(ImportproductInterface $importproductInterface, $id)
    {
        return response()->json($importproductInterface->importProduct($id));
    }
}
