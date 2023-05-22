<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\export_product;
use App\Models\import_product;
use App\Models\product;

class AddProduct extends Controller
{
    public function AddProduct(AddProductRequest $request)
    {
        $typeImportExport = $request->type;

        $product = new Product($request->validated());

        $productId = $product->id;

        if ($typeImportExport == 'export') {
            Export_product::create(['product_id' => $productId]);
        }
        if ($typeImportExport == 'import') {
            Import_product::create(['product_id' => $productId]);
        }

        return response()->json(['status' => 200, 'message' => 'Product added successfully']);
    }

}
