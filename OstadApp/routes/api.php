<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


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
