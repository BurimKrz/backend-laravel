<?php
namespace App\Services\Services;

use App\Http\Requests\AddProductRequest;
use App\Models\export_product;
use App\Services\Interfaces\AddExportInterface;


class AddExportService implements AddExportInterface
{

    public function createExportProduct(AddProductRequest $addProductRequest): Export_product
    {
        return Export_product::create([
            'product_id' => $addProductRequest['product_id'],
        ]);
    }
}
