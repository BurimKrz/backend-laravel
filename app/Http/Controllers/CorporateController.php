<?php

namespace App\Http\Controllers;

use App\Services\CorporateService;

class CorporateController extends Controller
{
    private CorporateService $corporateService;

    public function __construct(CorporateService $corporateService)
    {
        $this->corporateService = $corporateService;
    }
    public function showCorporate(CorporateService $corporateService, $id)
    {
        return response()->json($this->corporateService->coroprate($id), 200);
    }
}
