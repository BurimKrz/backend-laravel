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

    public function showCoverFile($productId, $fileType)
    {
        $file = FileUpload::join('file_has_product', 'file.id', '=', 'file_has_product.file_id')
            ->join('product', 'product.id', '=', 'file_has_product.product_id')
            ->join('file_has_types', 'file.id', '=', 'file_has_types.file_id')
            ->join('file_type', 'file_type.id', '=', 'file_has_types.type_id')
            ->where('product.id', $productId)
            ->where('file_type.id', $fileType)
            ->first(['file.URL']);

        if ($file) {
            $url = asset('storage/' . $file->URL);
            return $url;
        } else {
            return "File not found";
        }
    }
    public function showSlideFile($productId, $fileType)
    {
        $files = FileUpload::join('file_has_product', 'file.id', '=', 'file_has_product.file_id')
            ->join('product', 'product.id', '=', 'file_has_product.product_id')
            ->join('file_has_types', 'file.id', '=', 'file_has_types.file_id')
            ->join('file_type', 'file_type.id', '=', 'file_has_types.type_id')
            ->where('product.id', $productId)
            ->where('file_type.id', $fileType)
            ->get(['file.URL']);

        if ($files->isEmpty()) {
            return "No files found";
        }

        $urls = $files->map(function ($file) {
            return asset('storage/' . $file->URL);
        });

        return $urls;
    }
    public function showPdfFile($productId, $fileType)
    {
        $file = FileUpload::join('file_has_product', 'file.id', '=', 'file_has_product.file_id')
            ->join('product', 'product.id', '=', 'file_has_product.product_id')
            ->join('file_has_types', 'file.id', '=', 'file_has_types.file_id')
            ->join('file_type', 'file_type.id', '=', 'file_has_types.type_id')
            ->where('product.id', $productId)
            ->where('file_type.id', $fileType)
            ->first(['file.URL']);

        if ($file) {
            $url = asset('storage/' . $file->URL);
            return $url;
        } else {
            return "File not found";

        }
    }
}
