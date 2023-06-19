<?php

namespace App\Interfaces;
use App\Http\Requests\InterestedAtRequest;
use App\Models\InterestedAt;

interface InterestedAtInterface{
    public function createInterestedAt(InterestedAtRequest $interestedAtRequest): InterestedAt;

    public function delete($id, $languageId);
}