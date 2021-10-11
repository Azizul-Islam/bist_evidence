<?php

use App\Http\Controllers\Admin\AdminController;
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
Route::get('property/details/{slug}',[App\Http\Controllers\Frontend\FrontendController::class,'propertyDetails'])->name('property.details');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

