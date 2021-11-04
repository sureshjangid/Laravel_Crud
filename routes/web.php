<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::view('/','add');

Route::get('/user',[UserController::class,'userData']);

Route::post('/',[UserController::class,'userData']);

Route::get('/allUser',[UserController::class,'getData']);

Route::get('/update/{id}',[UserController::class,'getUpdate']);

Route::post('/update/{id}',[UserController::class,'updateWithID']);

Route::get('/allUser/{id}',[UserController::class,'deleteUser']);
