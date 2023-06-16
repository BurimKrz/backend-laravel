<?php

namespace App\Interfaces;

interface FileGetDataInterface
{
    public function showAllFiles();
    public function showCoverFile($productId, $fileType);
    public function showSlideFile($productId, $fileType);
    public function showPdfFile($productId, $fileType);
}
