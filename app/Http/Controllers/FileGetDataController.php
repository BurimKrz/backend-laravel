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
    public function showCoverFile($productId, $fileType)
    {
        return response()->json($this->fileGetDataInterface->showCoverFile($productId, $fileType), 200);
    }

    public function showSlideFile($productId, $fileType)
    {
        return response()->json($this->fileGetDataInterface->showSlideFile($productId, $fileType), 200);
    }
    public function showPdfFile($productId, $fileType)
    {
        return response()->json($this->fileGetDataInterface->showPdfFile($productId, $fileType), 200);
    }
}
