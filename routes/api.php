<?php

use App\Http\Controllers\AuthPictureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(RegisterController::class)->group(function(){
    Route::post('register','register'); 
    Route::post('login','login');  //('name route login', 'action/method login')
});

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('authpicture', AuthPictureController::class); //route to be able to post a picture
});

Route::apiResource('picture','\App\Http\Controllers\PictureController');
