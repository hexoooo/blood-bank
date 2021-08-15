<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\generalController;
use App\Http\Controllers\authController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/governorates', [generalController::class,'governorates']);
Route::get('/cities', [generalController::class,'cities']);
Route::get('/categories', [generalController::class,'categories']);
Route::get('/blood-types', [generalController::class,'BloodTypes']);
Route::get('/contact-us', [generalController::class,'ContactUs']);
Route::get('/app-info', [generalController::class,'AppInfo']);
Route::post('/register', [authController::class,'register']);
Route::post('/login', [authController::class,'login']);
Route::post('/reset-password', [authController::class,'ResetPassword']);
Route::group(['middleware'=>'authController:api'],function () { 
    Route::get('/set-new-password', [authController::class,'SetNewPassword']);   
    Route::get('/notifications', [authController::class,'notifications']);//incompelete
    Route::get('/profile-edit', [authController::class,'ProfileEdit']);
    Route::get('/profile', [authController::class,'profile']);
    Route::get('/posts', [authController::class,'posts']);
    Route::get('/fav-posts', [authController::class,'FavPosts']);
    Route::get('/make-donations', [authController::class,'MakeDonations']);
    Route::get('/donations', [authController::class,'donations']);
   
    
    
});

