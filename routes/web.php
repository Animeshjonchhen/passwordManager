<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[UserController::class,'index']);
Route::get('/users/create',[UserController::class,'create']);
Route::post('/users',[UserController::class,'store']);

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LoginController::class,'destroy']);