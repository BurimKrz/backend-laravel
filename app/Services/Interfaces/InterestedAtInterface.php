<?php
namespace App\Services\Interfaces;

use App\Http\Requests\InterestedAtRequest;
use App\Models\interestedAt;

interface InterestedAtInterface
{

    public function createInterestedAt(InterestedAtRequest $interestedAtRequest): interestedAt;

    public function selectInterstedProduct($id): interestedAt;

    public function delete($id);
}
