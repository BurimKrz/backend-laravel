<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\export_product;
use App\Models\product;
use App\Http\Resources\ExportResource;

class ExportProduct extends Controller
{
    function index(){
        return ExportResource::collection(product::all());
    }

    function index1(){
        
        // $exportProducts = DB::table('export_product as exp')
        //                  ->join('product as p', 'exp.product_id', '=', 'p.id')
        //                  ->select('exp.*', 'p.*')
        //                  ->get();

        $exportProducts = DB::table('export_product as exp')
        ->join('product as p', 'exp.product_id', '=', 'p.id')
        ->join('company as c', 'c.id', '=', 'p.company_id')
        ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
        ->select('p.name', 'p.description', 'p.price', 'p.imageURL', 'p.views', 'c.name as company_name', 'c.country', 'c.keywords', 'pc.name as category_name')
        ->get();
        $array = $exportProducts->map(function($obj){
            return (array)$obj;
        })->toArray();

        // $exportProductsArray = json_decode(json_encode($exportProducts), true);

         return ExportResource::collection($array);
    }
}
