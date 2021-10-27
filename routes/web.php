<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/',[FrontendController::class,'index']);
Route::get('/add-property',[FrontendController::class,'addPropertyIndex'])->name('frontend.add-property');
Route::post('getarea/{area_id}/sub',[FrontendController::class,'getChildAreaByParent']);
Route::post('add/property',[FrontendController::class,'addPropertyStore'])->name('add-property');
Route::get('property/details/{slug}',[FrontendController::class,'propertyDetails'])->name('property.details');
Route::get('property',[FrontendController::class,'property'])->name('property');
Route::get('/contct',[FrontendController::class,'contact'])->name('contact');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/properties',[FrontendController::class,'properties'])->name('properties');
Route::post('customer-response',[FrontendController::class,'customerResponse'])->name('customer-response.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


