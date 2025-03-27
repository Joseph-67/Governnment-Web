<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\organisationController;
use App\Http\Controllers\mandateController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\CompanyController;



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

Route::middleware('guest:web')->group(function(){
    Route::get('/', function () {
        return redirect('home');
    });
    Route::get('/home', [HomePageController::class, 'displayHome'])->name('home');
    Route::get('/organisation', [organisationController::class, 'displayOrganisation'])->name('organisation');
    Route::get('/home', [HomePageController::class, 'displayHome'])->name('home');
    Route::get('/organisation', [organisationController::class, 'displayOrganisation'])->name('organisation');
    Route::get('/mandate', [mandateController::class, 'displayMandate'])->name('mandate');    
    Route::get('/contact-us', [ContactUsController::class, 'displayContact'])->name('contact-us');    
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Company routes
    Route::controller(CompanyController::class)->group(function () {
        Route::get('/show-company/{company}', 'show')->name('show-company');
        Route::get('/{id}/edit', 'edit')->name('company.edit');
        Route::put('/{id}', 'update')->name('company.update');
        Route::delete('/{id}', 'destroy')->name('company.destroy');
    });
});



require 'admin.php';