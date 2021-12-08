<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CustomerResponseController;
use App\Http\Controllers\Admin\DefaultController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use Faker\DefaultGenerator;
use Illuminate\Support\Facades\Route;


Route::get('category/{category_id}/sub',[CategoryController::class,'getChildCategoryByParent']);
Route::get('area/{area_id}/sub',[App\Http\Controllers\Admin\AreaController::class,'getChildAreaByParent']);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('login','admin.auth.login')->name('login');
        Route::post('login',[AdminController::class,'login'])->name('login');

    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/',[AdminController::class,'index'])->name('home');
       //category route
        Route::resource('categories',CategoryController::class);
       

        //area route
        Route::resource('areas','App\Http\Controllers\Admin\AreaController');
        

        //amenities route
        Route::resource('amenities', AmenityController::class);

        //properties route
        Route::resource('properties',PropertyController::class);
        Route::post('property/status',[PropertyController::class,'propertyStatus'])->name('property.status');
        Route::post('floor/photo',[PropertyController::class,'floorPhotoUpdate'])->name('floor-photo.update');
        Route::get('floor/destroy/{id}',[PropertyController::class,'floorDestroy'])->name('floor.destroy');
        Route::get('feature/destroy/{id}',[PropertyController::class,'featureDestroy'])->name('feature.destroy');
        Route::put('property/approve/{property}',[PropertyController::class,'propertyApprove'])->name('property.approve');
        Route::get('agent-property',[DefaultController::class,'agentProperty'])->name('agent-property');
        Route::get('agent',[DefaultController::class,'agent'])->name('agent.index');
        Route::put('agent/status',[DefaultController::class,'agentStatus'])->name('agent.status');
        //customer response
        Route::get('customer-response',[CustomerResponseController::class,'index'])->name('customer-response.index');
        Route::put('customer-response/status',[CustomerResponseController::class,'status'])->name('customer-response.status');
        Route::get('customer-response/{show}/show',[CustomerResponseController::class,'show'])->name('customer-response.show');

        //frontend property
        Route::get('frontend-property',[DefaultController::class,'frontendProperty'])->name('frontend-property');
        Route::put('frontend-property/status{frontendProperty}',[DefaultController::class,'frontendPropertyStatys'])->name('frontend-property.status');
        //service Route
        Route::resource('service',ServiceController::class);
        Route::get('allservice',[ServiceController::class,'allService'])->name('service.allservice');

        //testimonials route
        Route::resource('testimonials',TestimonialController::class);

        //client route
        Route::resource('clients', ClientController::class);
        Route::post('client/status',[ClientController::class,'clientStatus'])->name('client.status');
    });
});
