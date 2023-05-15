<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImportResource;
use Illuminate\Support\Facades\DB;

class ImportProduct extends Controller
{
    public function import()
    {
        $importProducts = DB::table('import_product as imp')
            ->join('product as p', 'imp.product_id', '=', 'p.id')
            ->join('company as c', 'c.id', '=', 'p.company_id')
            ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
            ->select('p.id', 'p.name', 'p.description', 'p.price', 'p.imageURL', 'p.views', 'c.name as company_name', 'c.country', 'c.keywords', 'pc.name as category_name', 'p.created_at')
            ->get();

        $array = $importProducts->map(function ($obj) {
            return (array) $obj;
        })->toArray();

        return ImportResource::collection($array);
    }

    public function show($id)
    {
        $importProducts = DB::table('import_product as imp')
            ->join('product as p', 'imp.product_id', '=', 'p.id')
            ->join('company as c', 'c.id', '=', 'p.company_id')
            ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
            ->where('imp.product_id', '=', $id)
            ->select('p.name', 'p.description', 'p.price', 'p.imageURL', 'p.views', 'c.name as company_name', 'c.country', 'c.keywords', 'pc.name as category_name', 'imp.created_at')
            ->get();
        $array = $importProducts->map(function ($obj) {
            return (array) $obj;
        })->toArray();

        return ImportResource::collection($array);
    }
}
