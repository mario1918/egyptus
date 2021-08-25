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

Route::get('/', function () {
    return view('home');
});
//Auth::routes();

Route::resource("tourguides",con\TourguideController::class);
Route::resource("tourists",con\TouristController::class);
Route::get("signup", [con\TourguideController::class, 'create'])->name("tourguideSignup");
Route::get("register", [con\TouristController::class, 'create'])->name("touristSignup");

