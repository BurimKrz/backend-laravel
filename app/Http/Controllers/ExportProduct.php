<?php

namespace App\Http\Controllers;

use App\Interfaces\ExportInterface;
use App\Services\ExportService;

class ExportProduct extends Controller
{
    private ExportInterface $exportInterface;
    private ExportService $exportService;


    public function __construct(ExportInterface $exportInterface, ExportService $exportService){
        $this->exportInterface = $exportInterface;
        $this->exportService = $exportService;
    }
    public function index()
    {
        return response()->json([$this->exportInterface->productList()], 200);
    }

    public function showList(ExportService $exportService)
    {
       return response()->json([$this->exportService->showProducts()], 200);
    }

    public function show(ExportService $exportService, $id)
    {
       return response()->json([$this->exportService->showProduct($id)], 200);
    }

}
