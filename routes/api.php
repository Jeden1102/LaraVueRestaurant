<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\editAccount;
use App\Http\Controllers\orderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('/products',[ProductController::class,'store']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::post('/logout',[AuthController::class,'logout']);
    //USER INFO EDIT
    Route::post('/editGeneral',[editAccount::class,'general']);
    Route::post('/editDelivery',[editAccount::class,'deliveryInfo']);
    Route::post('/pwdChange',[editAccount::class,'pwdChange']);

});

//public routes:)
Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('/products/search/{name}',[ProductController::class,'search']);
Route::get('/productsSpecialls',[ProductController::class,'productSpecialls']);

Route::get("/products",[ProductController::class,'index']);
Route::get("/showCategories",[ProductController::class,'showCategories']);


//public users
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//public orders
Route::post('/orders',[orderController::class,'createOrder']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
