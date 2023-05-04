<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Validator;

class AddProduct extends Controller
{
    function AddExportProduct (Request $request){
        $validator = Validator::make(
            $request -> all(),
            [
                'name'=>'required|string|max:255', 
                'decription'=> 'required|string|max:255', 
                'price'=>'required|numeric', 
                'imageURL'=>'required|string|max:255',
                'category_id'=>'required|integer', 
                'copmapy_id'=>'required|integer'
            ]
        );

        if ($validator->fails()) {
            return response() -> json(['errors' => $validator->errors()], 400);
        }

        $AddExportProduct = AddExportProduct::create([
            'name' => $request->name, 
            'decription' =>$request->description, 
            'price' => $request->price, 
            'imageURL' => $request->imageURL, 
            'category_id'=> $request->category_id, 
            'copmapy_id'=> $request->company_id
        ]);

        return response()->json(['AddExportProduct'->$AddExportProduct]);
    }
}
