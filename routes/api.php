<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AddProduct;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyFilterController;
use App\Http\Controllers\CompanyListController;
// use Tests\Feature\Auth\RegistrationTest;
use App\Http\Controllers\ExportProduct;
use App\Http\Controllers\FilterProductController;
use App\Http\Controllers\ImportProduct;
use App\Http\Controllers\InterestedProductController;
use App\Http\Controllers\ModifyItem;
// use App\Http\Controllers\ItemExportController;
// use App\Http\Controllers\ItemImportController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\ViewController;
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

//Country list
Route::get('/country', [RegisterController::class, 'index']);

//Route for import list
Route::get('/ilist', [ImportProduct::class, 'import']);

//All product list
Route::get('/ProductAllList', [ExportProduct::class, 'index']);

//Route for export list
Route::get('/elist', [ExportProduct::class, 'showList']);

//View more for export product
Route::get('/elist/{id}', [ExportProduct::class, 'show']);

//View more for import product
Route::get('/ilist/{id}', [ImportProduct::class, 'show']);

//View more for company
Route::get('/company_details/{id}', [CompanyListController::class, 'companyDetails']);

//Show user token
Route::get('/token/{id}', [TokenController::class, 'token']);

//Number of views for product
Route::get('/view/{id}', [ViewController::class, 'view']);

//Created date for product
Route::get('/date/{id}', [ViewController::class, 'date']);

//Category of company
Route::get('/category', [CategoryController::class, 'category']);

//Subcategory of company
Route::get('/subcategory', [CategoryController::class, 'subcategory']);

//Category of product
Route::get('/productcategory', [CategoryController::class, 'productcategory']);

//List of all comapmanies
Route::get('/CompanyList', [CompanyListController::class, 'companyList']);

//Filter product base on subcategory
Route::get('/subcategory/{c_id}/{s_id}', [FilterProductController::class, 'filterProductSubCategory']);

//Filter company base on category
Route::get('/filterCompany/{id}', [CompanyFilterController::class, 'filterCompany']);

//Interested products
Route::get('/interstedProduct/{id}', [InterestedProductController::class, 'interestedProduct']);

//Update product
Route::put('/product/{id}', [ModifyItem::class, 'update']);

Route::put('/updateToken/{id}', [TokenController::class, 'updateToken']);

//Register a new user
Route::post('/register', [RegisterController::class, 'register']);

//Login
Route::post('/login', [AuthController::class, 'login']);

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//Create a new company
Route::post('/company', [CompanyController::class, 'company']);

//Activity area for comapany
Route::post('/activity', [ActivityController::class, 'activitycontroller']);

//Add a new product
Route::post('/add', [AddProduct::class, 'AddProduct']);

//Confiramtion from an user for buying a product
Route::post('/buyConfirmed', [BuyerController::class, 'buyerConfirmation']);

//Confiramtion from an owner for selling a product
Route::post('/sellConfirm', [SellerController::class, 'sellConfirmation']);

//Trede a product confimation
Route::post('/trade', [TradeController::class, 'store']);

//Add a product at interested list
Route::post('interestedAt', [InterestedProductController::class, 'interestedAt']);

//Detele a product
Route::delete('/product/{id}', [ModifyItem::class, 'destroy']);

//Delete a product from InterestedAt
Route::delete('/deleteProduct', [InterestedProductController::class, 'deleteInterestedAT']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return view('welcome');
});
