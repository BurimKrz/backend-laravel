<?php

namespace App\Http\Controllers;

use App\Interfaces\FileGetDataInterface;

class FileGetDataController extends Controller
{
    private FileGetDataInterface $fileGetDataInterface;
    public function __construct(FileGetDataInterface $fileGetDataInterface)
    {
        $this->fileGetDataInterface = $fileGetDataInterface;
    }
    public function showAllFiles()
    {
        return response()->json($this->fileGetDataInterface->showAllFiles(), 200);
    }
    public function showIndexFile($productId)
    {
        return response()->json($this->fileGetDataInterface->showIndexFile($productId), 200);
    }
}
