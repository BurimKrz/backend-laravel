<?php
namespace App\Interfaces;
use Illuminate\Http\Resources\Json\JsonResource;

interface ExportInterface{

    public function productList():JsonResource;
}