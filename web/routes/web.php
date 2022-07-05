<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;    
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\UsersController;  
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/them-san-pham',[HomeController::class,'getAdd']);

Route::post('/them-san-pham',[HomeController::class,'postAdd'])->name('postAdd');

Route::get('download-image',[HomeController::class,'downloadImage'])->name('download-Image');

Route::get('/login',[HomeController::class,'checkLogin'])->name('checkLogin');

Route::post('/login',[HomeController::class,'postCheckLogin'])->name('post_checkLogin');

Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::middleware('CheckLogin')->prefix('users')->name('users.')->group(function(){
    Route::get('/',[UsersController::class,'index'])->name('index');

    Route::get('/add',[UsersController::class,'Add'])->name('add');

    Route::post('/add',[UsersController::class,'postAdd'])->name('post-add');

    Route::get('/edit/{id}',[UsersController::class,'getEdit'])->name('edit');

    Route::post('/update',[UsersController::class,'postEdit'])->name('post-edit');

    Route::get('/delete/{id}',[UsersController::class,'Delete'])->name('delete');

    Route::get('/more/{id}',[UsersController::class,'More'])->name('more');

});
