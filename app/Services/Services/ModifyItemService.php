<?php
namespace App\Services\Services;

use App\Http\Requests\ModifyItemRequest;
use App\Models\product;
use App\Services\Interfaces\ModifyItemInterface;

class ModifyItemService implements ModifyItemInterface
{

    public function modifyProduct(ModifyItemRequest $modifyItemRequest, $id)
    {
        $product = Product::findOrFail($id);

        $product->name        = $modifyItemRequest['name'];
        $product->description = $modifyItemRequest['description'];
        $product->price       = $modifyItemRequest['price'];
        $product->imageURL    = $modifyItemRequest['imageURL'];
        $product->save();

        return response()->json(['product' => $product]);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted");

        //this API never has been used in front
    }
}
