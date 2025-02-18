<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ MyController, LoginController, HomeController, RegisterController,UserController, ProductController};

// Home & General Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/error500', fn() => abort(500, 'Internal Server Error'));
Route::get('/hello/{id?}', fn($val = "") => "<h1>Hello World $val</h1>");
Route::get('/user', fn() => view('users'));

// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

// User Routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/edit', [UserController::class, 'edit_action'])->name('users.update');
Route::post('/users/delete', [UserController::class, 'delete'])->name('users.delete');

// Product Routes
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'add_product'])->name('product.add');

// MyController Routes
Route::get('/mycontroller/{id?}', [MyController::class, 'myfunction']);
Route::post('/mycontroller/{id?}', [MyController::class, 'MYFUNCTION']);
