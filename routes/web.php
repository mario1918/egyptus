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
Route::get("verify/{user_id}", [con\Auth\LoginController::class, 'verification'])->name("verify");
Route::get("login", [App\Http\Controllers\Auth\LoginController::class, 'loginPage'])->name("loginPage");
Route::post("login", [con\Auth\LoginController::class, 'authenticate'])->name("login");
Route::get("logout", [con\Auth\LoginController::class, 'logout'])->name("logout");
Route::get("/test",function (){
    return view("test");
});

Route::get('/tourguidesProfiles', [con\TourguideController::class,'tourguidesProfile'])->name("tourguidesProfiles");
Route::get('/tourguide/{id}/profile', [con\TourguideController::class,'profile'])->name("tourguideProfile");




Route::middleware(['admin'])->group(function()
{
//        Route::get('/admin/dashboard',[con\AdminController::class,'index']);
        Route::resource('/users',App\Http\Controllers\UserController::class);
        Route::resource("tourguides",con\TourguideController::class)->except('create,store');
        // Route::resource("tourists",con\TouristController::class);
});

Route::post('/steps',[con\TourguideController::class,'steps'])->name('steps');

Route::middleware(['tourguide'])->group(function(){
    Route::post('/saveExpertises',[con\ExpertiseController::class,'saveExpertise']);
    Route::post('/saveLanguages',[con\ExpertiseController::class,'saveLanguages']);
});

// Route::get('/storeTrip',[con\TourguideController::class,'storeTrip']);
