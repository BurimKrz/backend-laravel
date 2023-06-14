<?php

namespace App\Interfaces;

use App\Http\Requests\FileRequest;


interface FileUpdateDeleteInterface
{
    public function updateFile(FileRequest $request, $id, $language);
    public function deleteFile($id, $language);
}