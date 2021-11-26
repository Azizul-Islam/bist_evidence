<?php

use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\AgentDashboardController;
use App\Http\Controllers\Agent\PropertyController;
use App\Http\Controllers\Frontend\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::prefix('agent')->name('agent.')->group(function(){
    Route::middleware(['guest:agent'])->group(function(){
        Route::get('login',[AgentController::class,'login'])->name('login');
        Route::post('login',[AgentController::class,'loginSubmit'])->name('login');
        
        Route::get('register',[AgentController::class,'register'])->name('register');
        Route::post('register',[AgentController::class,'registerStore'])->name('register');
        
        Route::get('faqs',[AgentDashboardController::class,'faqs'])->name('faqs');
    });

    Route::middleware(['auth:agent'])->group(function(){
        Route::get('/',[AgentController::class,'index'])->name('home');
        Route::post('logout',[AgentController::class,'logout'])->name('logout');

        Route::get('my-properties',[AgentDashboardController::class,'myProperties'])->name('my-properties');
        Route::get('favorite',[AgentDashboardController::class,'favorite'])->name('favorite');
        Route::get('compare',[AgentDashboardController::class,'compare'])->name('compare');
        Route::get('lock-screen',[AgentDashboardController::class,'lockScreen'])->name('lock-screen');
        Route::put('profile/update',[AgentDashboardController::class,'agentProfileUpdate'])->name('profile.update');
        Route::put('password/update',[AgentDashboardController::class,'agentPasswordUpdate'])->name('password.update');
        Route::get('submit-property',[AgentDashboardController::class,'submitProperty'])->name('submit-property');
        Route::post('property.store',[PropertyController::class,'store'])->name('property.store');
        Route::post('favorite/destroy/{id}',[FavoriteController::class,'destroy'])->name('favorite.destroy');
        
    });
    
});