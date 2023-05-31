<?php
namespace App\Interfaces;
use Illuminate\Http\Resources\Json\JsonResource;

interface CategoryInterface{

    public function companyCategory():JsonResource;

    public function companySubcategory():JsonResource;

    public function productCategory():JsonResource;

}