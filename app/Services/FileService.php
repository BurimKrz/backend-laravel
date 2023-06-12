<?php

namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\FileUpload;
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

            $file = FileUpload::create([
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
            $newFilePath = public_path('storage/' . $fileData['URL']);
            Storage::disk('public')->put($file->URL, $newFilePath);
            $destinationPath = 'public/' . $file->URL;

            if (file_exists($newFilePath)) {
                Storage::putFileAs($destinationPath, $newFilePath, $fileData['URL']);
            } else {
                return 'File not found: ' . $newFilePath;
            }

        }
    }
}
