<?php
namespace App\Services\Interfaces;

use App\Http\Requests\InterestedAtRequest;
use App\Models\interestedAt;
use Illuminate\Support\Collection;

interface InterestedAtInterface
{

    public function createInterestedAt(InterestedAtRequest $interestedAtRequest): interestedAt;

    public function selectInterstedProduct($id): Collection;

    public function delete($id);
}
