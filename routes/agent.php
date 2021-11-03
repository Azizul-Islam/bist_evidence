<?php

use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\AgentDashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('agent')->name('agent.')->group(function(){
    Route::middleware(['guest:agent'])->group(function(){
        Route::get('login',[AgentController::class,'login'])->name('login');
        Route::post('login',[AgentController::class,'loginSubmit'])->name('login');
        
        Route::get('register',[AgentController::class,'register'])->name('register');
        Route::post('register',[AgentController::class,'registerStore'])->name('register');
    });

    Route::middleware(['auth:agent'])->group(function(){
        Route::get('/',[AgentController::class,'index'])->name('home');
        Route::post('logout',[AgentController::class,'logout'])->name('logout');

        Route::get('my-properties',[AgentDashboardController::class,'myProperties'])->name('my-properties');
        Route::get('favorite',[AgentDashboardController::class,'favorite'])->name('favorite');
        Route::get('submit-property',[AgentDashboardController::class,'submitProperty'])->name('submit-property');
        Route::get('compare',[AgentDashboardController::class,'compare'])->name('compare');
    });
    
});