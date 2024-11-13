<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\RolesController;

Route::prefix('admin')->middleware('guest:admin')->group(function(){
    Route::controller(AdminsController::class)->group(function () {
        Route::get('/register', 'create_register')->name('admin.register');
        Route::post('/register', 'store')->name('admin.register');
        Route::get('/login', 'create_login')->name('admin.login');
        Route::post('/login', 'process_login')->name('admin.login');
    });
});

Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::controller(AdminsController::class)->group(function(){
        Route::get('/dashboard', 'display_dashboard')->name('admin.dashboard');
        Route::get('/logout', 'destroy')->name('admin.logout');
    });

    // roles
    Route::controller(RolesController::class)->group(function(){
        Route::get('/role', 'index')->name('admin.display-roles');
    });
});