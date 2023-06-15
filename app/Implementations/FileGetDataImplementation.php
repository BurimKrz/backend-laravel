<?php

namespace App\Implementations;

use App\Interfaces\FileGetDataInterface;
use App\Models\FileUpload;
use Illuminate\Support\Facades\File;

class FileGetDataImplementation implements FileGetDataInterface
{
    public function showAllFiles()
    {
        $files = File::allFiles(public_path('storage'));

        $fileUrls = [];

        foreach ($files as $file) {
            $url        = asset('storage/' . $file->getRelativePathname());
            $fileUrls[] = $url;
        }

        return $fileUrls;
    }

    public function showIndexFile($productId)
    {
        $file = FileUpload::join('file_has_product', 'file.id', '=', 'file_has_product.file_id')
            ->join('product', 'product.id', '=', 'file_has_product.product_id')
            ->where('product.id', $productId)
            ->first(['file.URL']);

        if ($file) {
            $url = asset('storage/' . $file->URL);
            return $url;
        } else {
            return "File not found";
        }
    }

}
