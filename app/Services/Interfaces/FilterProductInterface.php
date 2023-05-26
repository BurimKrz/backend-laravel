<?php
namespace App\Services\Interfaces;

interface FilterProductInterface
{

    public function filterProduct($id);

    public function filterSubcategory($category_id, $subcategory_id);
}
