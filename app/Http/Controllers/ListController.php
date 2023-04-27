<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ListController extends Controller
{
    public function show() {
        // Gets a collection of the roles that the authenticated user has, and checks if the collection contains the role commander
        if(!Auth::user()->getRoleNames()->contains('commander')) {
            return response()->json(['error' => 'Unauthorized!.'], 401);
        }

        return response()->json(
            [
                'Saxon' => 'MP40',
                'Spear' => 'Wall'
            ], 200
        );
    }

    public function dummy_method() {
        return true;
    }
}
