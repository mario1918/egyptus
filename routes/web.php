<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as con;

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

Route::get('/', [con\HomeController::class, 'home'])->name('home');

//Auth::routes();
Route::middleware(['auth'])->group( function()  {
        Route::post('addRreview', [con\TourguideController::class, "addReviews"])->name('addReviews');
});


//Auth Routes
Route::resource("tourguides",con\TourguideController::class);
Route::resource("tourists",con\TouristController::class);
Route::get("register", [con\TourguideController::class, 'create'])->name("tourguideSignup");
Route::get("signup", [con\TouristController::class, 'create'])->name("touristSignup");
Route::get("verify/{user_id}", [con\HomeController::class, 'verification'])->name("verif");
Route::get("login", [App\Http\Controllers\Auth\LoginController::class, 'loginPage'])->name("loginPage");
Route::post("login", [con\Auth\LoginController::class, 'authenticate'])->name("login");
Route::get("logout", [con\Auth\LoginController::class, 'logout'])->name("logout");


Route::get('/tourguide/{id}/profile', [con\TourguideController::class,'profile'])->name("toruguideProfile");


Route::middleware(['admin'])->group(function()
{
        Route::resource('/users',App\Http\Controllers\UserController::class);
        // Route::resource("tourguides",con\TourguideController::class);
        // Route::resource("tourists",con\TouristController::class);
});



Route::group(['prefix' => 'admin'], function () {
});
