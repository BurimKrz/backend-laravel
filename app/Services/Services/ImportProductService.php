<?php
namespace App\Services\Services;

use App\Http\Resources\ImportResource;
use App\Models\import_product;
use App\Services\Interfaces\ImportproductInterface;

class ImportProductService implements ImportproductInterface
{

    public function importProducts()
    {
        $importProducts = import_product::join('product as p', 'import_product.product_id', '=', 'p.id')
            ->join('company as c', 'c.id', '=', 'p.company_id')
            ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
            ->select(
                'p.id',
                'p.name',
                'p.description',
                'p.price',
                'p.imageURL',
                'p.views',
                'c.name as company_name',
                'c.country',
                'c.keywords',
                'pc.name as category_name',
                'p.created_at'
            )
            ->get();

        return ImportResource::collection($importProducts);
    }

    public function importProduct($id)
    {
        $importProducts = Import_product::join('product as p', 'import_product.product_id', '=', 'p.id')
            ->join('company as c', 'c.id', '=', 'p.company_id')
            ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
            ->where('import_product.product_id', $id)
            ->select(
                'p.name',
                'p.description',
                'p.price',
                'p.imageURL',
                'p.views',
                'c.name as company_name',
                'c.country',
                'c.keywords',
                'pc.name as category_name',
                'import_product.created_at'
            )
            ->get();

        return ImportResource::collection($importProducts);
    }
}