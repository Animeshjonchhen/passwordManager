<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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

Route::get('/users/create',[UserController::class,'create']);
Route::post('/users',[UserController::class,'store']);
Route::get('/users',[UserController::class,'index']);

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LoginController::class,'destroy']);

Route::get('/',[PasswordController::class,'index']);
Route::get('/create/password',[PasswordController::class,'create']);
Route::post('/create/password',[PasswordController::class,'store']);

Route::get('/category',[CategoryController::class,'index']);
Route::get('/create/category',[CategoryController::class,'create']);
Route::post('/create/category',[CategoryController::class,'store']);
Route::delete('/delete/{id}',[CategoryController::class,'destroy']);