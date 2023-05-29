<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExportResource;
use App\Models\export_product;
use App\Models\product;
use App\Services\Interfaces\ExportProductInterface;

class ExportProduct extends Controller
{
    public function index()
    {
        return ExportResource::collection(product::all());
    }

    public function showList(ExportProductInterface $exportProductInterface)
    {
       return response()->json([$exportProductInterface->showProducts()], 200);
    }

    public function show(ExportProductInterface $exportProductInterface, $id)
    {
       return response()->json([$exportProductInterface->showProduct($id)], 200);
    }

}
