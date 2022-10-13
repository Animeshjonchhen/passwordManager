<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Password;
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

Route::get('/', [function () {
    if (auth()->user()) {
        return view('Password.index', [
            'passwords' => Password::all()
        ]);
    } else {
        return view('home');
    }
}]);


//Users
Route::get('/users', [UserController::class, 'index']);
Route::get('/create/user', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/update/users/{user}', [UserController::class, 'show']);
Route::put('/update/users/{user}', [UserController::class, 'edit']);
Route::delete('/delete/users/{user}', [UserController::class, 'destroy']);


//Sessions
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);


//Password
Route::get('/password', [PasswordController::class, 'index']);
Route::get('/create/password', [PasswordController::class, 'create']);
Route::post('/create/password', [PasswordController::class, 'store']);
Route::delete('/delete/password/{password}', [PasswordController::class, 'destroy']);
Route::get('/update/password/{password}', [PasswordController::class, 'show']);
Route::put('/update/password/{password}', [PasswordController::class, 'edit']);



//Category
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/create/category', [CategoryController::class, 'create']);
Route::post('/create/category', [CategoryController::class, 'store']);
Route::get('/update/category/{category}', [CategoryController::class, 'show']);
Route::put('/update/category/{category}', [CategoryController::class, 'edit']);
Route::delete('/delete/category/{category}', [CategoryController::class, 'destroy']);
