<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/login',
    [LoginController::class, 'index']);
Route::get('/register',
    [RegisterController::class, 'index']);
Route::post('/register',
    [RegisterController::class, 'create']);
Route::get('/home',
    [HomeController::class, 'index']);
Route::get('/',
    [HomeController::class, 'index']);
Route::get('/users',
    [UserController::class, 'index']);

Route::get('/mycontroller/{id?}',
    [MyController::class, 'myfunction']);
Route::post('/mycontroller/{id?}',

    [MyController::class, 'MYFUNCTION']);
    Route::get('/error500', function (){
        abort(500, 'Internal Server Error');
    });
Route::get('/hello/{id?}',
    function ($val="") {
     return "<h1>Hello World $val</h1>";


});
