<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\AuthController;

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
Route::get('/governorates', [GeneralController::class,'governorates']);
Route::get('/cities', [GeneralController::class,'cities']);
Route::get('/categories', [GeneralController::class,'categories']);
Route::get('/blood-types', [GeneralController::class,'bloodTypes']);
Route::get('/contact-us', [GeneralController::class,'contactUs']);
Route::get('/app-info', [GeneralController::class,'appInfo']);
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/reset-password', [AuthController::class,'resetPassword']);
Route::group(['middleware'=>'AuthController:api'],function () { 
    Route::get('/set-new-password', [AuthController::class,'setNewPassword']);   
    Route::get('/notifications', [AuthController::class,'notifications']);//incompelete
    Route::get('/profile-edit', [AuthController::class,'profileEdit']);
    Route::get('/profile', [AuthController::class,'profile']);
    Route::get('/posts', [AuthController::class,'posts']);
    Route::get('/fav-posts', [AuthController::class,'favPosts']);
    Route::get('/make-donations', [AuthController::class,'makeDonations']);
    Route::get('/donations', [AuthController::class,'donations']);
   
    
    
});

