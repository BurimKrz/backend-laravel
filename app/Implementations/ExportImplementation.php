<?php

namespace App\Implementations;

use App\Http\Resources\ExportResource;
use App\Interfaces\ExportInterface;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ExportImplementation implements ExportInterface
{

    public function productList(): JsonResource
    {
        return ExportResource::collection(Product::paginate(10));
    }

}
