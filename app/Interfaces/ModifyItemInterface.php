<?php
namespace App\Interfaces;

use App\Http\Requests\ModifyItemRequest;

interface ModifyItemInterface
{

    public function modifyProduct(ModifyItemRequest $modifyItemRequest, $id);

    public function deleteProduct($id, $languageId);
}
