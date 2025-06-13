<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\staffcontroller;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

//HomeControllerRoute

Route::get("/", [HomeController::class,"index"]);


//AdminControllerRoute

Route::get("/redirects", [AdminController::class,"redirects"]);

Route::get("/users", [AdminController::class,"user"]);

Route::get("/deleteuser/{id}", [AdminController::class,"deleteuser"]);

Route::get("/foodmenu", [AdminController::class,"foodmenu"]);

Route::post("/uploadfood", [AdminController::class,"upload"]);

Route::get("/deletemenu/{id}", [AdminController::class,"deletemenu"]);

Route::get("/updateview/{id}", [AdminController::class,"updateview"]);

Route::post("/update/{id}", [AdminController::class,"update"]);

Route::post("/reservation",[AdminController::class,"reservation"]);

Route::get("/viewreservation",[AdminController::class,"viewreservation"]);


// chefroute
Route::get("/viewchef", [AdminController::class,"viewchef"]);

Route::post("/uploadchef", [AdminController::class,"uploadchef"]);

Route::get("/updatechef/{id}", [AdminController::class,"updatechef"]);

Route::post("/updatefoodchef/{id}", [AdminController::class,"updatefoodchef"]);

Route::get("/deletechef/{id}", [AdminController::class,"deletechef"]);


Route::get("/viewcreditcard",[AdminController::class,"viewcreditcard"]);

Route::get("/viewqr",[AdminController::class,"viewqr"]);

Route::get("/viewstaff", [AdminController::class,"viewstaff"]);

Route::post("/uploadduty", [AdminController::class,"uploadduty"]);

Route::get("/deleteduty/{id}", [AdminController::class,"deleteduty"]);

Route::get("/updateduty/{id}", [AdminController::class, "updateduty"]);

Route::post("/updatee/{id}", [AdminController::class, "updatee"]);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//loginRoute

Route::get('/loginn', function () {
    return view('loginn');
});

 {
     return view('loginn');
 };


