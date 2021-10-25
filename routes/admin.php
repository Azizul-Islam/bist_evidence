<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('login','admin.auth.login')->name('login');
        Route::post('login',[AdminController::class,'login'])->name('login');

    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/',[AdminController::class,'index'])->name('home');
       //category route
        Route::resource('categories',CategoryController::class);
        Route::get('category/{area_id}/sub',[CategoryController::class,'getChildCategoryByParent']);

        //area route
        Route::resource('areas','App\Http\Controllers\Admin\AreaController');
        Route::get('area/{area_id}/sub',[App\Http\Controllers\Admin\AreaController::class,'getChildAreaByParent']);

        //amenities route
        Route::resource('amenities', AmenityController::class);

        //properties route
        Route::resource('properties','App\Http\Controllers\Admin\PropertyController');
        Route::post('property/status',[App\Http\Controllers\Admin\PropertyController::class,'propertyStatus'])->name('property.status');

        //consumer request
        Route::get('consumer-request',[App\Http\Controllers\Admin\ConsumerRequestController::class,'index'])->name('consumer-request.index');
        Route::get('consumer-request/{show}/show',[App\Http\Controllers\Admin\ConsumerRequestController::class,'show'])->name('consumer-request.show');

        //service Route
        Route::resource('service',ServiceController::class);
        Route::get('allservice',[ServiceController::class,'allService'])->name('service.allservice');

        //client route
        Route::resource('clients', ClientController::class);
        Route::post('client/status',[ClientController::class,'clientStatus'])->name('client.status');
    });
});
