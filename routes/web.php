<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;






Route::get('/admin',  [AdminController::class, 'loginAdmin']);
Route::post('/admin',  [AdminController::class, 'postLoginAdmin']);




Route::prefix('admin')->group(function(){
    Route::get('dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'App\Http\Controllers\DashboardController@dashboard'
    ]);
    //category admin
    Route::prefix('categories')->group(function(){
        Route::get('/', [
            'as' => 'category.index',
            'uses' => 'App\Http\Controllers\CategoryController@index'
        ]);
        Route::get('/create', [
            'as' => 'category.create',
            'uses' => 'App\Http\Controllers\CategoryController@create'
        ]);
        Route::post('/store', [
            'as' => 'category.store',
            'uses' => 'App\Http\Controllers\CategoryController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'category.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'category.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'category.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete'
        ]);
    });
    //menu admin
    Route::prefix('menu')->group(function(){
        Route::get('/', [
            'as' => 'menu.index',
            'uses' => 'App\Http\Controllers\MenuController@index'
        ]);
        Route::get('/create', [
            'as' => 'menu.create',
            'uses' => 'App\Http\Controllers\MenuController@create'
        ]);
        Route::post('/store', [
            'as' => 'menu.store',
            'uses' => 'App\Http\Controllers\MenuController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'menu.edit',
            'uses' => 'App\Http\Controllers\MenuController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'menu.update',
            'uses' => 'App\Http\Controllers\MenuController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'menu.delete',
            'uses' => 'App\Http\Controllers\MenuController@delete'
        ]);
    });

    //products
    Route::prefix('products')->group(function(){
        Route::get('/', [
            'as' => 'prodducts.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index'
        ]);
        Route::get('/create', [
            'as' => 'prodducts.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create'
        ]);

        Route::post('/store', [
            'as' => 'prodducts.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'prodducts.edit',
            'uses' => 'App\Http\Controllers\AdminProductController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'prodducts.update',
            'uses' => 'App\Http\Controllers\AdminProductController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'prodducts.delete',
            'uses' => 'App\Http\Controllers\AdminProductController@delete'
        ]);
    });


    //slide
    Route::prefix('slider')->group(function(){
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'App\Http\Controllers\AdminSliderController@index'
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'App\Http\Controllers\AdminSliderController@create'
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'App\Http\Controllers\AdminSliderController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'App\Http\Controllers\AdminSliderController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'App\Http\Controllers\AdminSliderController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'App\Http\Controllers\AdminSliderController@delete'
        ]);
    });


    //setting
    Route::prefix('setting')->group(function(){
        Route::get('/', [
            'as' => 'setting.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index'
        ]);
        Route::get('/create', [
            'as' => 'setting.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create'
        ]);
        Route::post('/store', [
            'as' => 'setting.store' . '?type=' .  request()->type,
            'uses' => 'App\Http\Controllers\AdminSettingController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'setting.edit',
            'uses' => 'App\Http\Controllers\AdminSettingController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'setting.update',
            'uses' => 'App\Http\Controllers\AdminSettingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'setting.delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@delete'
        ]);
    });
});






