<?php
namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\product;

class FileService
{
    public function AddFile(FileRequest $request)
    {

        $latestProduct      = Product::latest()->first();
        $lastKnownProductId = $latestProduct->id;

        $files = [];

        $fileDataArray = $request->input('files', []);

        foreach ($fileDataArray as $fileData) {
            $file = File::create([
                'URL' => $fileData['URL'],
            ]);

            FileHasProduct::create([
                'file_id'    => $file->id,
                'product_id' => $lastKnownProductId,
            ]);

            foreach ($fileData['typeId'] as $typeId) {
                FileHasType::create([
                    'file_id' => $file->id,
                    'type_id' => $typeId,
                ]);
            }

            $files[] = $file;
        }

        return $files;
    }
}

//         //Create COver file if the client choose to add Cover file
//         if ($fileRequest->cover_image != null) {
//             $file = File::create([
//                 'URL' => $fileRequest->URL,
//             ]);

//             //Create the File type
//             $typeCover = FileType::create([
//                 'file_id'     => $file->id,
//                 'PDF'         => null,
//                 'cover_image' => $fileTypeRequest->cover_image,
//                 'slide_image' => null,
//             ]);

//             //associated file id with product id
//             FileProduct::create([
//                 'file_id'    => $file->id,
//                 'product_id' => $lastKnownProductId,
//             ]);

//             //associated file id with type id

// //////////////////////////////////////////////////////////////////////////////////////
//         //Create PDF file if the client choose to add PDF file
//         if ($fileRequest->PDF != null) {
//             $file = File::create([
//                 'URL' => $fileRequest->URL,
//             ]);

//             //Create the File type
//             $PDFtype = FileType::create([
//                 'file_id'     => $file->id,
//                 'PDF'         => $fileTypeRequest->PDF,
//                 'cover_image' => null,
//                 'slide_image' => null,
//             ]);

//             //associated file id with product id
//             FileProduct::create([
//                 'file_id'    => $file->id,
//                 'product_id' => $lastKnownProductId,
//             ]);

//             //associated file id with type id
//             FileAssociated::create([
//                 'file_id' => $file->id,
//                 'type_id' => $PDFtype->id,
//             ]);
//         }
// //////////////////////////////////////////////////////////////////////////////////////
// //Create PDF file if the client choose to add PDF file
//         if ($fileRequest->slide_image != null) {
//             $file = File::create([
//                 'URL' => $fileRequest->URL,
//             ]);
// //Create the File type
//             $typeType = FileType::create([
//                 'file_id'     => $file->id,
//                 'PDF'         => null,
//                 'cover_image' => null,
//                 'slide_image' => json_encode(['URL' => $fileTypeRequest->slide_image]),
//             ]);

// //associated file id with product id
//             FileProduct::create([
//                 'file_id'    => $$file->id,
//                 'product_id' => $lastKnownProductId,
//             ]);

// //associated file id with type id
//             FileAssociated::create([
//                 'file_id' => $file->id,
//                 'type_id' => $typeType->id,
//             ]);

//         }

// public function ShowFiles($id)
// {
//     $product = Product::findOrFail($id);
//     $files   = File::whereHas('fileProducts', function ($query) use ($id) {
//         $query->where('product_id', $id);
//     })->get();

//     $fileTypes = FileType::whereIn('file_id', $files->pluck('id'))->get();

//     $fileTypes->transform(function ($fileType) {
//         $fileType->slide_image = json_decode($fileType->slide_image);
//         return $fileType;
//     });

// }
// public function updateFile(Request $request, $fileId)
// {
//     $file = File::findOrFail($fileId);

//     if ($request->hasFile('URL')) {

//         $file->URL = $request->file('URL')->store('URL');
//         $file->save();

//         $fileType              = FileType::where('file_id', $fileId)->first();
//         $fileType->slide_image = json_encode(['URL' => $file->URL]);
//         $fileType->cover_image = json_encode(['URL' => $file->URL]);
//         $fileType->save();
//     }

//     if ($request->hasFile('PDF')) {

//         $file->URL = $request->file('PDF')->store('PDF');
//         $file->save();

//         $fileType      = FileType::where('file_id', $fileId)->first();
//         $fileType->PDF = 'PDF';
//         $fileType->save();
//     }
// }
// public function deleteFile($fileId)
// {

//     FileProduct::where('file_id', $fileId)->delete();
//     FileType::where('file_id', $fileId)->delete();
//     File::destroy($fileId);

// }

// }
