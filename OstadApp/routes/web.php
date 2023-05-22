<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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



// post route name
Route::post('/name',[BookController::class,'createName']);


// get json Format route
Route::get('/response',[BookController::class,'CreateJson']);
// file upload route
Route::post('/upload',[BookController::class,'photo']);


// cookie route
Route::post('/Cookie',[BookController::class,'rememberToken']);

// header user agent route
Route::post('/UserAgent',[BookController::class,'userAgent']);

// page query parameter route
Route::get('/page',[BookController::class,'page']);


// post request route handler
Route::post('/submit',[BookController::class,'createPost']);






