<?php
namespace App\Services\Services;

use App\Http\Resources\ExportResource;
use App\Models\export_product;
use App\Services\Interfaces\ExportProductInterface;

class ExportProductService implements ExportProductInterface
{
    public function showProducts()
    {
        $exportProducts = export_product::join('product as p', 'export_product.product_id', '=', 'p.id')
            ->join('company as c', 'c.id', '=', 'p.company_id')
            ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
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
                'p.id',
                'p.created_at'
            )
            ->get();

        return ExportResource::collection($exportProducts);

    }

    public function showProduct($id)
    {
        $exportProducts = Export_product::join('product as p', 'export_product.product_id', '=', 'p.id')
            ->join('company as c', 'c.id', '=', 'p.company_id')
            ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
            ->where('export_product.product_id', $id)
            ->select(
                'export_product.id',
                'p.name',
                'p.description',
                'p.price',
                'p.imageURL',
                'p.views',
                'c.name as company_name',
                'c.country',
                'c.keywords',
                'pc.name as category_name',
                'export_product.created_at'
            )
            ->get();

        return ExportResource::collection($exportProducts);
    }

}