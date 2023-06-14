<?php

namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function AddFile(FileRequest $request)
    {
        $latestProduct      = Product::latest()->first();
        $lastKnownProductId = $latestProduct ? $latestProduct->id : null;

        $fileDataArray = $request->input('files', []);

        foreach ($fileDataArray as $fileData) {
            $fileDirectory = ($fileData['typeId'] === 1 || $fileData['typeId'] === 2) ? 'images' : 'pdf';

            $file = File::create([
                'URL' => $fileData['URL'],
            ]);

            FileHasProduct::create([
                'file_id'    => $file->id,
                'product_id' => $lastKnownProductId,
            ]);

            FileHasType::create([
                'file_id' => $file->id,
                'type_id' => $fileData['typeId'],
            ]);

            // Move the file to the respective directory
            $newFilePath = public_path('storage/' . $fileDirectory . '/');
            Storage::move($newFilePath, $file->URL);

        }
    }
}
