<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Interfaces\FileUpdateDeleteInterface;

class FileUpdateDeleteController extends Controller
{
    private FileUpdateDeleteInterface $fileUpdateDeleteInterface;
    public function __construct(FileUpdateDeleteInterface $fileUpdateDeleteInterface)
    {
        $this->fileUpdateDeleteInterface = $fileUpdateDeleteInterface;
    }
    public function updateFile(FileRequest $request, $id)
    {
        return response()->json($this->fileUpdateDeleteInterface->updateFile($request, $id), 200);
    }
    public function deleteFile($id)
    {
        return response()->json($this->fileUpdateDeleteInterface->deleteFile($id), 200);
    }
}
