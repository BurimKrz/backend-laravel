<?php

namespace App\Http\Controllers;

use App\Services\ViewService;

class ViewController extends Controller
{

    private ViewService $viewService;
    public function __construct(ViewService $viewService){
        $this->viewService = $viewService;
    }
    public function view(ViewService $viewService, $id)
    {
        return response()->json($this->viewService->views($id), 200);
    }

    public function date(ViewService $viewService, $id)
    {
        return response()->json($this->viewService->dateOfView($id), 200);
    }
}
