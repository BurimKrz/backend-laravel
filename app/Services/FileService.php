<?php
namespace App\Services;

use App\Models\File;
use App\Models\FileProduct;
use App\Models\FileType;
use App\Models\product;
use Illuminate\Http\Request;

class FileService
{
    public function AddFile(Request $request)
    {

        $latestProduct      = product::latest()->first();
        $lastKnownProductId = $latestProduct->id;

        if ($request->hasFile('URL')) {
            foreach ($request->file('URL') as $URL) {
                $file = File::create([
                    'URL' => $URL->store('URL'),
                ]);

                FileType::create([
                    'file_id'     => $file->id,
                    'PDF'         => null,
                    'cover_image' => null,
                    'slide_image' => json_encode(['URL' => $file->URL]),
                ]);

                FileProduct::create([
                    'file_id'    => $file->id,
                    'product_id' => $lastKnownProductId,
                ]);
            }
        }

        if ($request->hasFile('PDF')) {
            $pdfFile = FileType::create([
                'URL' => $request->file('PDF')->store('PDF'),
            ]);

            FileType::create([
                'file_id'     => $pdfFile->id,
                'PDF'         => 'PDF',
                'cover_image' => null,
                'slide_image' => null,
            ]);

            FileProduct::create([
                'file_id'    => $pdfFile->id,
                'product_id' => $lastKnownProductId,
            ]);
        }
    }

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

}
