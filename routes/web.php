<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PhotoController;



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


Route::get('/',[IndexController::class,'index']);
Route::get('/registration',[IndexController::class, 'reg']);
Route::post('/userReg',[IndexController::class,'store']);

Route::post('/login',[AuthController::class,'login']);

//middleware

Route::group([
    'middleware' => ['auth:sanctum', 'userIsLoggedIn']
], function(){
    Route::get('/allPhotos',[PhotoController::class, 'index']);
    Route::get('/addNewPhoto',[PhotoController::class, 'create']);
    Route::post('addPhoto',[PhotoController::class, 'store']);


    Route::get('/logout',[AuthController::class,'destroy']);

});

