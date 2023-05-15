<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AddProduct;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyFilterController;
use App\Http\Controllers\CompanyListController;
use App\Http\Controllers\ExportProduct;
use App\Http\Controllers\FilterProductController;
// use Tests\Feature\Auth\RegistrationTest;
use App\Http\Controllers\ImportProduct;
use App\Http\Controllers\ModifyItem;
use App\Http\Controllers\PurchaseConfirmedController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TokenController;
// use App\Http\Controllers\ItemExportController;
// use App\Http\Controllers\ItemImportController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\SellController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/country', [RegisterController::class, 'index']);

Route::get('/ilist', [ImportProduct::class, 'import']);

Route::get('/ProductAllList', [ExportProduct::class, 'index']);

//Route for export list
Route::get('/elist', [ExportProduct::class, 'showList']);

//Route for import list

Route::get('/elist/{id}', [ExportProduct::class, 'show']);

Route::get('/ilist/{id}', [ImportProduct::class, 'show']);

Route::get('/company_details/{id}', [CompanyListController::class, 'companyDetails']);

Route::get('/token/{id}', [TokenController::class, 'token']);

Route::get('/view/{id}', [ViewController::class, 'view']);

Route::get('/date/{id}', [ViewController::class, 'date']);

Route::get('/category', [CategoryController::class, 'category']);

Route::get('/subcategory', [CategoryController::class, 'subcategory']);

Route::get('/productcategory', [CategoryController::class, 'productcategory']);

Route::get('/CompanyList', [CompanyListController::class, 'companyList']);

Route::get('/subcategory/{c_id}/{s_id}', [FilterProductController::class, 'filterProductSubCategory']);

Route::get('/filterCompany/{id}', [CompanyFilterController::class, 'filterCompany']);

Route::put('/product/{id}', [ModifyItem::class, 'update']);

Route::put('/updateToken/{id}', [TokenController::class, 'updateToken']);

Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/company', [CompanyController::class, 'company']);

Route::post('/activity', [ActivityController::class, 'activitycontroller']);

Route::post('/add', [AddProduct::class, 'AddProduct']);

Route::post('/buy', [PurchaseConfirmedController::class, 'purchaseConfirmed']);

Route::post('/sellConfirm', [SellController::class, 'sellConfirmation']);

Route::delete('/product/{id}', [ModifyItem::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return view('welcome');
});
