<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\general;
use App\Http\Controllers\authController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\ClientController;
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
//front links
route::get("/front-home",'FrontController@home')->name("frontHome");
route::get("/front-about-us",'FrontController@aboutUs');
route::get("/article/{id}",'FrontController@article');
route::get("/donation-request/{id}",'FrontController@donationRequest');
route::get("/donation-requests",'FrontController@allDontions');
route::get("/contact-us",'FrontController@contactUs');
route::post("/send",'FrontController@send');
route::get("/signin-account",'FrontController@signinAccount');
route::post("/signin",'FrontController@login');
route::get("/create-account",'FrontController@createAccount');
route::post("/create-new",'FrontController@create');
// route::get("/favourite/{id}",'FrontController@favourite');

//end front links
route::get("/main",function(){return view('welcome');});
//governorates
route::resource("/governorates",'GovernorateController');
// categories
route::resource("/categories",'CategoryController');
//cities
route::resource("/cities",'CityController');
//clients
route::resource("/clients",'ClientController');
//donations
route::resource("/donations",'DonationController');
//contacts
route::resource("/contacts",'ContactController');
//settings
route::resource("/settings",'SettingsController');
//reset password
route::resource("/reset",'ResetController');
//rules
route::resource("/roles",'RoleController');
//permissions
route::resource("/permissions",'PermissionController');
//users
route::resource("/users",'UserController');

// posts
route::resource("/posts",'PostController');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//breez

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
