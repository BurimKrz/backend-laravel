<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Services\Interfaces\ViewInterface;

class ViewController extends Controller
{
    public function view(ViewInterface $viewInterface, $id)
    {
        return response()->json([$viewInterface->views($id)], 200);
    }

    public function date(ViewInterface $viewInterface, $id)
    {
        return response()->json([$viewInterface->dateOfView($id)], 200);
    }
}
