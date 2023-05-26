<?php
namespace App\Services\Interfaces;

use App\Http\Requests\InterestedInRequest;
use App\Models\interestedIn;

interface InterestedInterface
{

    public function createInterestedIn(InterestedInRequest $interestedInRequest): interestedIn;

    public function showInterestedIn($id);

    public function delete($id);

}
