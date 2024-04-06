<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerName;
use App\Http\Controllers\messageController;
use App\Http\Controllers\resource1;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('signup');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');



Route::get('/user', function () {
    return view('user');
});

Route::get('/user1',[ControllerName::class , 'returnString']);
Route::get('/user2/{name}',[ControllerName::class , 'returnParam']);
Route::get('/user3',[ControllerName::class , 'returnJson']);
Route::resource('resource1',resource1::class);
Route::post('/message/create',[messageController::class , 'create']);
Route::post('/message',[messageController::class , 'create2']);
Route::patch('/message/{id}',[messageController::class , 'edit']);
Route::delete('/message/{id}',[messageController::class , 'delete']);
Route::post('/test/create',[TestController::class , 'create']);
Route::patch('/msg/create',[TestController::class , 'create']);




Route::post('/register', [UserController::class, 'register'])->name('register');


