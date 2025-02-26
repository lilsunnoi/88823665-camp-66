<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// User Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/edit', [UserController::class, 'edit_action'])->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products/insert', [ProductController::class, 'insert'])->name('insert');

// Error Page
Route::get('/error500', function () {
    abort(500, 'Internal Server Error');
});

// Other Routes
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'add_product'])->name('product.add');
Route::get('/mycontroller/{id?}', [MyController::class, 'myfunction']);
Route::post('/mycontroller/{id?}', [MyController::class, 'MYFUNCTION']);
Route::get('/user', function () {
    return view('users');
});
Route::get('/hello/{id?}', function ($val = "") {
    return "<h1>Hello World $val</h1>";
});
