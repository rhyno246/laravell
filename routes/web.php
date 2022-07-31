<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/create', [CategoryController::class, 'create']);

Route::post('/categories/store', [CategoryController::class, 'store']);

Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);

Route::post('/categories/update/{id}', [CategoryController::class, 'update']);

Route::post('/categories/delete/{id}', [CategoryController::class, 'delete']);




