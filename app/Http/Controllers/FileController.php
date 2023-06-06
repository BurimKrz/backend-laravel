<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    private FileService $FileService;

    public function __construct(FileService $FileService)
    {
        $this->FileService = $FileService;
    }

    public function addFile(Request $request)
    {
        return response()->json($this->FileService->addFile($request), 200);
    }
}
