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
    public function updateFile(FileRequest $request, $id, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        return response()->json($this->fileUpdateDeleteInterface->updateFile($request, $id, $language), 200);
    }
    public function deleteFile($id, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        return response()->json($this->fileUpdateDeleteInterface->deleteFile($id, $language), 200);
    }
}
