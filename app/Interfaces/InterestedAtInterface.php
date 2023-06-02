<?php

namespace App\Interfaces;
use App\Http\Requests\InterestedAtRequest;
use App\Models\interestedAt;

interface InterestedAtInterface{
    public function createInterestedAt(InterestedAtRequest $interestedAtRequest): interestedAt;

    public function delete($id);
}