<?php

namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\FileUpload;
use App\Models\Product;

class FileService
{
    public function AddFile(FileRequest $request)
    {
        error_log("hello");

        $latestProduct      = Product::latest()->first();
        $lastKnownProductId = $latestProduct ? $latestProduct->id : null;

        $test = $request->file('files')->store('pdf/', 'public');

        $file = FileUpload::create([
            'URL' => $test,
        ]);

        FileHasProduct::create([
            'file_id'    => $file->id,
            'product_id' => $lastKnownProductId,
        ]);

        FileHasType::create([
            'file_id' => $file->id,
            'type_id' => $request->typeId,
        ]);

    }
}
