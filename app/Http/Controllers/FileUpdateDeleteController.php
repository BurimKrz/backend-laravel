<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Interfaces\FileUpdateDeleteInterface;
use Illuminate\Support\Facades\App;

class FileUpdateDeleteController extends Controller
{
    private FileUpdateDeleteInterface $fileUpdateDeleteInterface;
    public function __construct(FileUpdateDeleteInterface $fileUpdateDeleteInterface)
    {
        $this->fileUpdateDeleteInterface = $fileUpdateDeleteInterface;
    }
    public function updateFile(FileRequest $request, $id, $languageId)
    {
        return response()->json($this->fileUpdateDeleteInterface->updateFile($request, $id, $languageId), 200);
    }
    public function deleteFile($id, $languageId)
    {
        return response()->json($this->fileUpdateDeleteInterface->deleteFile($id, $languageId), 200);
    }
}
