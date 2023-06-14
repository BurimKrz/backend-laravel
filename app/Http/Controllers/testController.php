<?php

namespace App\Http\Controllers;

use App\Models\File;

class testController extends Controller
{
    public function test()
    {
        $data = File::all();

        return response()->json($data);

    }
}
