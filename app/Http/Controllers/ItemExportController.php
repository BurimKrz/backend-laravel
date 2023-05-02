<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\export_item;

class ItemExportController extends Controller
{
    function itemExport(Request $request){
       $validator = Validator::make(
        $request->all(),
        [
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255', 
            'price'=>'required|numeric', 
            'category'=>'required|string|max:255'
        ]
        );

        if ($validator->fails()) {
            return response() -> json(['errors' => $validator->errors()], 400);
        }

        $itemExport = export_item::create(
            [
                'name'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price, 
                'category'=>$request->category
            ]);

            return response()->json(['export_item' => $itemExport], 201);
    }
}
