<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\PostController;

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
//     return view('welcome');
// });
// Route::controller(AuthenController::class)->group(function(){
//     Route::get('/registration','registration')->middleware('alreadyLoggedIn');
//     Route::post('/registration-user','registerUser')->name('register-user');
//     Route::get('/login','login')->middleware('alreadyLoggedIn');
//     Route::post('/login-user','loginUser')->name('login-user');
//     Route::get('/dashboard','dashboard')->middleware('isLoggedIn');
//     Route::get('/logout','logout');
// });


Route::get('/registration', [AuthenController::class, 'registration'])->middleware('alreadyLoggedIn');
Route::post('/registration-user', [AuthenController::class, 'registerUser'])->name('register-user');

Route::get('/', [AuthenController::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('/login-user', [AuthenController::class, 'loginUser'])->name('login-user');
Route::post('add-post',[PostController::class,'store'])->name('add-post');
Route::get('/dashboard',[AuthenController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[AuthenController::class, 'logout']);
Route::get('/active/{id}',[PostController::class, 'update']);
Route::get('/inactive/{id}',[PostController::class, 'inactive']);
Route::get('/delete/{id}',[PostController::class, 'destroy']);
