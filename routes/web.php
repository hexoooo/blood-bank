<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\general;
use App\Http\Controllers\authController;
use App\Http\Controllers\governorateController;
use App\Http\Controllers\clientController;
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
route::get("/frontHome",'frontController@home')->name("frontHome");
route::get("/frontAboutUs",'frontController@AboutUs');
route::get("/article/{id}",'frontController@article');
route::get("/donationRequest/{id}",'frontController@donationRequest');
route::get("/donationRequests",'frontController@allDontions');
route::get("/contact-us",'frontController@contactUs');
route::post("/send",'frontController@send');
route::get("/signin-account",'frontController@signinAccount');
route::post("/signin",'frontController@login');
route::get("/create-account",'frontController@createAccount');
route::post("/create-new",'frontController@create');
// route::get("/favourite/{id}",'frontController@favourite');

//end front links
route::get("/main",function(){return view('welcome');});
//governorates
route::resource("/governorates",'governorateController');
route::post("governorate/store",'governorateController@store');
route::post("governorate/update/{id}",'governorateController@update');
route::get("governorate/delete/{id}",'governorateController@destroy');
// categories
route::resource("/categories",'categoryController');
route::post("category/store",'categoryController@store');
route::post("category/update/{id}",'categoryController@update');
route::get("category/delete/{id}",'categoryController@destroy');
//cities
route::resource("/cities",'cityController');
route::post("cities/store",'cityController@store');
route::post("cities/update/{id}",'cityController@update');
route::get("cities/delete/{id}",'cityController@destroy');
//clients
route::resource("/clients",'clientController');
route::get("client/delete/{id}",'clientController@destroy');
//donations
route::resource("/donations",'donationController');
route::get("donations/delete/{id}",'donationController@destroy');
//contacts
route::resource("/contacts",'contactController');
route::get("contacts/delete/{id}",'contactController@destroy');
//settings
route::resource("/settings",'settingsController');
//reset password
route::resource("/reset",'resetController');
//rules
route::resource("/roles",'rolesController');
//permissions
route::resource("/permissions",'permissionsController');
//users
route::resource("/users",'usersController');

// posts
route::resource("/posts",'postController');
route::post("post/store",'postController@store');
route::post("post/update/{id}",'postController@update');
route::get("post/delete/{id}",'postController@destroy');
route::get("post/create",'postController@create');







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
