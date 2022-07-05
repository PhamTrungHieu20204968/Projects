<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RestaurantController;

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

Route::get('/restaurants',[RestaurantController::class,'index']);
Route::post('/add',[RestaurantController::class,'store']);
Route::get('/edit/{id}',[RestaurantController::class,'edit']);
Route::put('/update/{id}',[RestaurantController::class,'update']);
Route::delete('/delete/{id}',[RestaurantController::class,'delete']);
Route::get('/more/{id}',[RestaurantController::class,'more']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
