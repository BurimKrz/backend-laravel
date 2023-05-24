<?php
namespace App\Services\Services;

use App\Http\Requests\AddProductRequest;
use App\Models\product;
use App\Services\Interfaces\AddExportInterface;
use App\Services\Interfaces\AddImportInterface;
use App\Services\Interfaces\AddProductInterface;

class AddProductServices implements AddProductInterface
{

    public function createProduct(AddProductRequest $addProductRequest, AddImportInterface $addImportInterface,
        AddExportInterface $addExportInterface): product {

        return product::create(
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

        $productId = $addProductRequest->id;

        if ($typeImportExport == 'export') {
            $addExportInterface->createExportProduct($addProductRequest);
        }
        if ($typeImportExport == 'import') {
            $addExportInterface->createExportProduct($addProductRequest);
        }

    }

}
