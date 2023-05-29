<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifyItemRequest;
use App\Services\Interfaces\ModifyItemInterface;

class ModifyItem extends Controller
{
    public function update(ModifyItemInterface $modifyItemInterface, ModifyItemRequest $modifyItemRequest, $id)
    {
        return response()->json([$modifyItemInterface->modifyProduct($modifyItemRequest, $id)], 200);
    }

    public function destroy(ModifyItemInterface $modifyItemInterface, $id)
    {
        return response()->json([$modifyItemInterface->deleteProduct($id)], 200);
    }
}
