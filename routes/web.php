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
Route::post('/auth/login', [UsersController::class, 'getLogin']);
Route::get('/auth/login', [UsersController::class, 'showLoginForm']);
Route::get('/auth/register', [UsersController::class, 'showRegisterForm']);
Route::post('/auth/post-register', [UsersController::class, 'postRegister']);
Route::get('/auth/email-activation/{userId}', [UsersController::class, 'sendActivationEmail']);
Route::get('/auth/activate-this/{email}', [UsersController::class, 'activateUser']);

//LOGOUT
Route::get('auth/logout', function(){
    session_destroy();
    return redirect('/');
});

//PUBLIC PAGES
Route::get('/', [HomeController::class, 'index']);
Route::get('/users',[UsersController::class, 'getUsers']);
Route::get('/plan/{id}',[SubscriptionsController::class, 'plan']);
Route::get('/subscription',[SubscriptionsController::class, 'index']);

//ADMIN PAGES
Route::get('/admin', [AdminController::class, 'index']);


//TOOLS