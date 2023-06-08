<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Services\FileService;

class FileController extends Controller
{
    private FileService $FileService;

    public function __construct(FileService $FileService)
    {
        $this->FileService = $FileService;
    }

    public function addFile(FileRequest $request)
    {
        return response()->json($this->FileService->addFile($request), 200);
    }
}
