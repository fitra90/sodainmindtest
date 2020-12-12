<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\AdminController;
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

// LOGIN & REGISTER
Route::view('/auth/login', 'pages/auth/login');
Route::post('/auth/login', [UsersController::class, 'getLogin']);
Route::view('/auth/register', 'pages/auth/register');
Route::post('/auth/register', [UsersController::class, 'getRegister']);

//LOGOUT
Route::get('logout', function(){
    return redirect('/auth/login');
});

//PUBLIC PAGES
Route::get('/', [HomeController::class, 'index']);
Route::get('/users',[UsersController::class, 'getUsers']);
Route::get('/subscription',[SubscriptionsController::class, 'index']);
Route::get('/subscription',[SubscriptionsController::class, 'index']);

//ADMIN PAGES
Route::get('/admin', [AdminController::class, 'index']);
