<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SubscriptionsController;
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

Route::get('/', [Home::class, 'index']);

// LOGIN
Route::view('auth/login', 'pages/auth/login');
Route::post('auth/users', [UsersController::class, 'getLogin']);

//LOGOUT
Route::get('logout', function(){
    return redirect('/auth/login');
});
//PAGES
Route::get('/users',[UsersController::class, 'getUsers']);
Route::get('/subscription',[SubscriptionsController::class, 'index']);