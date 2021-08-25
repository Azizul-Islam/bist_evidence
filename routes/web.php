<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('/add-property',[App\Http\Controllers\Frontend\FrontendController::class,'addPropertyIndex'])->name('frontend.add-property');
Route::post('getarea/{area_id}/sub',[App\Http\Controllers\Frontend\FrontendController::class,'getChildAreaByParent']);
Route::post('add/property',[App\Http\Controllers\Frontend\FrontendController::class,'addPropertyStore'])->name('add-property');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::get('/',[App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');

    //category route
    Route::resource('categories','App\Http\Controllers\Admin\CategoryController');

    //area route
    Route::resource('areas','App\Http\Controllers\Admin\AreaController');
    Route::get('area/{area_id}/sub',[App\Http\Controllers\Admin\AreaController::class,'getChildAreaByParent']);

    //properties route
    Route::resource('properties','App\Http\Controllers\Admin\PropertyController');
    Route::post('property/status',[App\Http\Controllers\Admin\PropertyController::class,'propertyStatus'])->name('property.status');

    //consumer request
    Route::get('consumer-request',[App\Http\Controllers\Admin\ConsumerRequestController::class,'index'])->name('consumer-request.index');
});
