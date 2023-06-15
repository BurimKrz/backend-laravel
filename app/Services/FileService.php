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
        // $storedData = Session::get('stored_data');

        // if ($storedData) {
        // $productId = $this->processData($storedData)

        $latestProduct      = Product::latest()->first();
        $lastKnownProductId = $latestProduct ? $latestProduct->id : null;

        $filePath = $request->file('files')->store('pdf', 'public');

        $file = FileUpload::create([
            'URL' => $filePath,
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
    // private function processData($data)
// {
//     $processedData = [];

//     foreach ($data as $item) {

//         $processedItem = $item;

//         $processedData[] = $processedItem;
//     }

//     return $processedData;
// }
// }
}
