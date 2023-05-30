<?php

namespace App\Implementations;

use App\Http\Requests\AddProductRequest;
use App\Interfaces\ProductInterface;
use App\Models\export_product;
use App\Models\import_product;
use App\Models\product;

class ProductImplementation implements ProductInterface
{

    public function createProduct(AddProductRequest $addProductRequest): Product
    {
        $product = Product::create(
            [
                'name'           => $addProductRequest['name'],
                'description'    => $addProductRequest['description'],
                'price'          => $addProductRequest['price'],
                'imageURL'       => $addProductRequest['imageURL'],
                'type'           => $addProductRequest['type'],
                'views'          => $addProductRequest['views'],
                'category_id'    => $addProductRequest['category_id'],
                'subcategory_id' => $addProductRequest['subcategory_id'],
                'company_id'     => $addProductRequest['company_id'],
            ]
        );

        $typeImportExport = $addProductRequest->type;

        $productId = $product->id;

        if ($typeImportExport == 'export') {
            $this->createExportProduct($productId);
        }
        if ($typeImportExport == 'import') {
            $this->createImportProduct($productId);
        }
        return $product;
    }
    public function createExportProduct($id): Export_product
    {
        return export_product::create([
            'product_id' => $id,
        ]);
    }
    public function createImportProduct($id): Import_product
    {
        return import_product::create([
            'product_id' => $id,
        ]);
    }
}
