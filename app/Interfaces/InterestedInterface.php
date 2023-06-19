<?php
namespace App\Interfaces;

use App\Http\Requests\InterestedInRequest;
use App\Models\InterestedIn;

interface InterestedInterface
{
    public function createInterestedIn(InterestedInRequest $interestedInRequest): InterestedIn;
    public function delete($id, $languageId);

}
