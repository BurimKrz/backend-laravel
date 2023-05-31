<?php
namespace App\Interfaces;

use App\Http\Requests\InterestedInRequest;
use App\Models\interestedIn;

interface InterestedInterface
{
    public function createInterestedIn(InterestedInRequest $interestedInRequest): interestedIn;
    public function delete($id);

}
