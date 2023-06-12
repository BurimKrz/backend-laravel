<?php

namespace App\Http\Controllers;

use App\Services\ExportService;

class ExportProduct extends Controller
{
    private ExportService $exportService;


    public function __construct(ExportService $exportService){
        $this->exportService = $exportService;
    }

    public function showList(ExportService $exportService)
    {
       return response()->json($this->exportService->showProducts(), 200);
    }

    public function show(ExportService $exportService, $id)
    {
       return response()->json($this->exportService->showProduct($id), 200);
    }

}
