<?php

namespace App\Http\Controllers;

use App\Interfaces\InterestedInterface;
use App\Services\InterestedInService;
use Illuminate\Support\Facades\App;

class InterestedInListController extends Controller
{
    private InterestedInService $interestedInService;
    private InterestedInterface $interestedInterface;
    public function __construct(InterestedInService $interestedInService, InterestedInterface $interestedInterface){
        $this->interestedInService = $interestedInService;
        $this->interestedInterface = $interestedInterface;
    }

    public function interestedIn(InterestedInService $interestedInService, $id)
    {
        return response()->json($this->interestedInService->showInterestedIn($id), 200);
    }

    public function destroy(InterestedInterface $interestedInterface, $id, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        return response()->json($this->interestedInterface->delete($id, $language), 200);
    }

}
