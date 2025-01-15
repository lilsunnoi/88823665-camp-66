<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/mycontroller/{id?}', [MyController::class, 'myfunction']);
Route::post('/mycontroller/{id?}', [MyController::class, 'myfunction']);

Route::get('/', function () {
    return view('home');
});

Route::get('/hello/{id?}', function ($val = "") {
    return "<h1>Hello World $val</h1>";
});

