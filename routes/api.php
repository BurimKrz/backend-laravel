<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportProduct;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportPoduct;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/register', [RegisterController::class, 'register']);



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', [ExportProduct::class ,'index']);

//Route for export list
Route::get('/elist',[ExportProduct::class,'index1']);

//Route for import list
Route::get('/ilist',[ImportPoduct::class, 'import']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


