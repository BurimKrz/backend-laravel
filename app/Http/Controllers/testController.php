<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class testController extends Controller
{
    public function test()
    {
        $files = File::allFiles(public_path('storage'));

        $fileUrls = [];

        foreach ($files as $file) {
            $url        = asset('storage/' . $file->getRelativePathname());
            $fileUrls[] = $url;
        }

        return $fileUrls;
    }
}
