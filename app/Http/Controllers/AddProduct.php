<?php

namespace App\Http\Controllers;

use App\Models\export_product;
use App\Models\import_product;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddProduct extends Controller
{
    public function AddProduct(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|numeric',
                'imageURL' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'views' => 'integer',
                'category_id' => 'required|integer',
                'company_id' => 'required|integer',
            ]
        );

        $typeImportExport = $request->type;

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()]);
        } else {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->imageURL = $request->imageURL;
            $product->type = $request->type;
            $product->views = $request->views;
            $product->category_id = $request->category_id;
            $product->company_id = $request->company_id;
            $product->save();

            $productId = $product->id;

            if ($typeImportExport == 'export') {
                export_product::create(['product_id' => $productId]);
                // Insert the product ID into the export_product table
                // DB::table('export_product')->insert([
                // 'product_id' => $productId
                // ]);
            }
            if ($typeImportExport == 'import') {
                import_product::create(['product_id' => $productId]);
                // Insert the product ID into the import_product table
                // DB::table('import_product')->insert([
                //     'product_id' => $productId
                // ]);
            }

            // return response()->json(['AddProduct'->$AddProduct]);
            return response()->json(['status' => 200, 'message' => 'Product added successfully']);
        }
    }
}
