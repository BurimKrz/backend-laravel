<?php
namespace App\Services\Interfaces;
use App\Http\Resources\ExportResource;

interface ExportProductInterface{

    public function showProducts();

    public function showProduct($id);

}