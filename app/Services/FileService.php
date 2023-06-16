<?php

namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\FileUpload;

class FileService
{
    public function AddFile(FileRequest $request)
    {
        // $storedData = Session::get('stored_data');

        // if ($storedData) {
        // $productId = $this->processData($storedData)

        // $latestProduct      = Product::latest()->first();
        // $lastKnownProductId = $latestProduct ? $latestProduct->id : null;

        $typeId        = $request->typeId;
        $filePath      = '';
        $fileExtension = $request->file('files')->getClientOriginalExtension();
        $imgMimes      = ['jpg', 'png', 'jpeg'];
        if ($typeId == 1 && in_array($fileExtension, $imgMimes)) {
            $filePath = $request->file('files')->store('Images/cover', 'public');
        } elseif ($typeId == 2 && in_array($fileExtension, $imgMimes)) {
            $filePath = $request->file('files')->store('Images/slide', 'public');
        } elseif ($typeId == 3 && $fileExtension === 'pdf') {
            $filePath = $request->file('files')->store('Documents/pdf', 'public');
        } else {
            return response()->json(['error' => 'Invalid file type or type ID'], 400);
        }

        $file = FileUpload::create([
            'URL' => $filePath,
        ]);

        FileHasProduct::create([
            'file_id'    => $file->id,
            'product_id' => 4,
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
