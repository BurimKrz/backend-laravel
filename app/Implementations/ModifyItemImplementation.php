<?php
namespace App\Implementations;

use App\Http\Requests\ModifyItemRequest;
use App\Interfaces\ModifyItemInterface;
use App\Models\product;

class ModifyItemImplementation implements ModifyItemInterface
{

    public function modifyProduct(ModifyItemRequest $modifyItemRequest, $id)
    {
        $product = product::findOrFail($id);

        $product->name        = $modifyItemRequest['name'];
        $product->description = $modifyItemRequest['description'];
        $product->price       = $modifyItemRequest['price'];
        $product->imageURL    = $modifyItemRequest['imageURL'];
        $product->save();

        return $product;
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted");
    }

}
