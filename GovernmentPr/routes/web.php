<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\organisationController;
use App\Http\Controllers\mandateController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyUsersController;
use App\Http\Controllers\EmailApp;
use App\Http\Controllers\IndividualCompanyReportController;
use App\Http\Controllers\StockTradingController;
use App\Http\Controllers\RealTimeUpdateController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CMS\PageController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EmailIntegration;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   |--------------------------------------------------------------------------
*/

Route::middleware('guest:web')->group(function(){
    Route::get('/', function () {
        return redirect('home');
    });
    Route::get('/home', [HomePageController::class, 'displayHome'])->name('home');
    Route::get('/contact-us', [ContactUsController::class, 'displayContact'])->name('contact-us');
    Route::get('/{slug}', [PageController::class, 'show'])->middleware('page.available')->name('page.show');   
});


Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Dashboard
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    
    // Company routes
    Route::controller(CompanyController::class)->group(function () {
        Route::get('/show-company/{company}', 'show')->name('company.show-company');
        Route::get('/{id}/edit', 'edit')->name('company.edit');
        Route::put('/{id}', 'update')->name('company.update');
        Route::delete('/{id}', 'destroy')->name('company.destroy');
    });

    // Company Users routes
    Route::controller(CompanyUsersController::class)->group(function () {
        Route::get('/company-users/{user}', 'index')->name('company-users.index');
        Route::get('/company-users/create', 'create')->name('company-users.create');
        Route::post('/company-users', 'store')->name('company-users.store');
        Route::get('/company-users/{id}/edit', 'edit')->name('company-users.edit');
        Route::put('/company-users/{id}', 'update')->name('company-users.update');
        Route::delete('/company-users/{id}', 'destroy')->name('company-users.destroy');
    });

    // Email application
    Route::get('/email-app', [EmailApp::class, 'index'])->name('view-email-app');
    
    //individual company reports
    Route::controller(IndividualCompanyReportController::class)->group(function() {
    Route::get('/individual-company-report/{user}', 'index')->name('individual-company-report');
});

    
    // Stock Trading
    Route::get('/stock-trading', [StockTradingController::class, 'index'])->name('view-stock-trading');
    
    // Real-Time Updates
    Route::get('/real-time-updates', [RealTimeUpdateController::class, 'index'])->name('view-real-time-updates');
    
    // Pages
    Route::get('/CMS', [PagesController::class, 'index'])->name('CMS.pages');
    
    // Posts
    Route::get('/cms-posts', [PostsController::class, 'index'])->name('CMS.posts');
    
    // Events
    Route::get('/cms-events', [EventController::class, 'index'])->name('CMS.events');
    Route::get('/create-events', [AddEventController::class, 'index'])->name('CMS.add-event');
    
    // Email integration
    Route::get('/email', [EmailIntegration::class, 'index'])->name('email-integration');
});
require 'admin.php';