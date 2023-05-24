<?php
namespace App\Services\Services;

use App\Http\Requests\AddProductRequest;
use App\Models\import_product;
use App\Services\Interfaces\AddImportInterface;

class AddImportService implements AddImportInterface
{

    public function createImportProduct(AddProductRequest $addProductRequest): import_product
    {
        return Import_product::create([
            'product_id' => $addProductRequest['product_id'],
        ]);
    }
}
