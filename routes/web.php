<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\FavoriteController;
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
Route::get('/cc', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');
    return 'DONE';
});
Route::get('/',[FrontendController::class,'index']);
Route::post('getarea/{area_id}/sub',[FrontendController::class,'getChildAreaByParent']);
Route::get('property/details/{slug}',[FrontendController::class,'propertyDetails'])->name('property.details');
Route::get('property',[FrontendController::class,'property'])->name('property');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::post('/contact',[FrontendController::class,'contactStore'])->name('contact');
Route::get('page/{slug}',[FrontendController::class,'page'])->name('page');
Route::get('/terms',[FrontendController::class,'terms'])->name('terms');
Route::get('/faqs',[FrontendController::class,'faqs'])->name('faqs');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/properties',[FrontendController::class,'properties'])->name('properties');
Route::get('/add-your-property',[FrontendController::class,'addProperty'])->name('add-your-property');
Route::post('add-property',[FrontendController::class,'addPropertyStore'])->name('add-property');
Route::post('add-to-favorite',[FavoriteController::class,'addToFavorite'])->name('add-to-favorite');
Route::post('customer-response',[FrontendController::class,'customerResponse'])->name('customer-response.store');
Route::post('review/store',[FrontendController::class,'reviewStore'])->name('review.store');
Route::get('projects',[FrontendController::class,'projects'])->name('projects');
Route::get('blogs',[FrontendController::class,'blogs'])->name('blogs');
Route::get('blog/{slug}',[FrontendController::class,'blogDetails'])->name('blog');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


