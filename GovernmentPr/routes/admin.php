<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\GuardsController;
use App\Http\Controllers\generalSetting;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AddPostController;

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

    // permissions
    Route::controller(PermissionsController::class)->group(function() {
        Route::post('/permission', 'store')->name('admin.store-permission');
    });

    //users
    Route::controller(UsersManagementController::class)->group(function(){
        Route::get('/users-management', 'show_usersmanagement')->name('admin.users-management');
    });
    // roles
    Route::controller(RolesController::class)->group(function(){
        Route::get('/settings/role', 'index')->name('admin.display-roles');
        Route::post('/settings/role', 'store')->name('admin.store-role');
        Route::post('/settings/assign_role_has_permission', 'assign_role_permission')->name('admin.update.permission-role');
        Route::post('/settings/revoke_role_has_permission', 'revoke_role_permission')->name('admin.revoke.permission-role');
        Route::post('/settings/role-change', 'guard_change')->name('admin.guard-change');
    });
    // settings
    Route::controller(generalSetting::class)->group(function() {
        Route::get('/general-setting', 'index')->name('admin.general-setting');
    });
    // Guards
    Route::controller(GuardsController::class)->group(function() {
        Route::post('/guard', 'store')->name('admin.store-guard');
    }); 

    //Pages
    Route::controller(PagesController::class)->group(function() {
        Route::get ('/CMS', 'index')->name('CMS.CMS');
    }); 

      //Posts
      Route::controller(PostsController::class)->group(function() {
        Route::get ('/cms-posts', 'index')->name('CMS.posts');
    }); 
      Route::controller(AddPostController::class)->group(function() {
        Route::get ('/cms-Addpost', 'index')->name('CMS.add-post');
    }); 
});
