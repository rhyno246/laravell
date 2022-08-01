<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;


Route::get('/admin',  [AdminController::class, 'loginAdmin']);

Route::post('/admin',  [AdminController::class, 'postLoginAdmin']);




Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'App\Http\Controllers\DashboardController@index'
    ]);
    Route::prefix('categories')->group(function(){
        Route::get('/', [
            'as' => 'category.index',
            'uses' => 'App\Http\Controllers\CategoryController@index'
        ]);
        Route::get('/create', [
            'as' => 'category.create',
            'uses' => 'App\Http\Controllers\CategoryController@create'
        ]);
    });
});

//category




//category
// Route::get('/categories', [CategoryController::class, 'index']);

// Route::get('/categories/create', [CategoryController::class, 'create']);

// Route::post('/categories/store', [CategoryController::class, 'store']);

// Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);

// Route::post('/categories/update/{id}', [CategoryController::class, 'update']);

// Route::get('/categories/delete/{id}', [CategoryController::class, 'delete']);



// Route::get('/menu', [MenuController::class, 'index']);

// Route::get('/menu/create', [MenuController::class, 'create']);

// Route::post('/menu/store', [MenuController::class, 'store']);

// Route::get('/menu/edit/{id}', [MenuController::class, 'edit']);

// Route::post('/menu/update/{id}', [MenuController::class, 'update']);

// Route::get('/menu/delete/{id}', [MenuController::class, 'delete']);





