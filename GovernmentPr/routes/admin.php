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
use App\Http\Controllers\EmailIntegration;
use App\Http\Controllers\EmailApp;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AddEventController;
use App\Http\Controllers\RECPController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CompanyMaterialController;
use App\Http\Controllers\ChemicalUsageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\MapReport;

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
        Route::get('/admin-details',  'getAllAdmins')->name('admins.details');
    });

    // permissions
    Route::controller(PermissionsController::class)->group(function() {
        Route::post('/permission', 'store')->name('admin.store-permission');
    });

    //users
    Route::controller(UsersManagementController::class)->group(function(){
        Route::get('/users-management', 'show_usersmanagement')->name('admin.users-management');
        Route::get('/users-details',  'getAllUsers')->name('users.details');
        Route::post('/view-users',  'store')->name('view.details');

    });
    // roles
    Route::controller(RolesController::class)->group(function(){
        Route::get('/settings/role', 'index')->name('admin.display-roles');
        Route::post('/settings/role', 'store')->name('admin.store-role');
        Route::post('/settings/assign_role_has_permission', 'assign_role_permission')->name('admin.update.permission-role');
        Route::post('/settings/revoke_role_has_permission', 'revoke_role_permission')->name('admin.revoke.permission-role');
        Route::post('/settings/role-change', 'guard_change')->name('admin.guard-change');
        Route::post('/settings/fetch-role-permission', 'get_role_permission')->name('admin.fetch.role-permission');
    });
    // settings
    Route::controller(generalSetting::class)->group(function() {
        Route::get('/general-setting', 'create')->name('admin.general-setting');
        Route::post ('/register-settings', 'store')->name('admin.store-settings');
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
        Route::post ('/save-posts', 'store')->name('admin.store-post');
    }); 
      Route::controller(AddPostController::class)->group(function() {
        Route::get ('/cms-Addpost', 'index')->name('CMS.add-post');
    });

    //Events
    Route::controller(EventController::class)->group(function() {
        Route::get ('/cms-events', 'index')->name('CMS.event');
    }); 
    Route::controller(AddEventController::class)->group(function() {
        Route::get ('/create-events', 'index')->name('CMS.add-event');
    }); 
    // Email integration
    Route::controller(EmailIntegration::class)->group(function() {
        Route::get ('/email', 'index')->name('email-configuration');
    });
    // email application
    Route::controller(EmailApp::class)->group(function() {
        Route::get ('/email-app', 'index')->name('view-email');
        Route::get ('/fetch-user', 'fetch_users')->name('get-user');
        Route::post ('/save-email', 'store')->name('send-mail');
    
    });

    //Material
    Route::controller(MaterialController::class)->group(function() {
        Route::get ('/materials', 'index')->name('materials.material');
        Route::post ('/save-material', 'store')->name('admin.store-material');
    }); 

    //Chemicals
    Route::controller(ChemicalUsageController::class)->group(function() {
        Route::get ('/chemicals', 'index')->name('chemicals.chemicalUsage');
        Route::post ('/save-chemicals', 'store')->name('admin.store-chemical');
    }); 

    Route::controller(CompanyChemicalUsageController::class)->group(function() {
        Route::get('/chemical-view/{chemicalUsage}', 'show')->name('admin.view-chemicalUsage');
    }); 

    Route::controller(CompanyController::class)->group(function() {
        Route::get('/company', 'index')->name('admin.view-company');
        Route::get('/create-company', 'create')->name('admin.create-company');
        Route::post('/save-company', 'store')->name('admin.store-company');
        Route::get('/show-company/{company}', 'show')->name('admin.show-company');
        Route::get('/company/{id}/create-recp', 'create_resp')->name('admin.create-recp');
        Route::post('/save-company-recp', 'store_recp')->name('admin.store-company-recp');
        Route::post('/add-company-policy', 'add_company_policy')->name('admin.add-company-policy');
        Route::post('/remove-company-policy', 'remove_company_policy')->name('admin.remove-company-policy');
        Route::post('/add-company-objective', 'add_company_objective')->name('admin.add-company-objective');
        Route::post('/remove-company-objective', 'remove_company_objective')->name('admin.remove-company-objective');
        Route::post('/company/update', 'updateCompanyDetails')->name('update-company-details');
        Route::post('/company/update-location', 'updateCompanyLocation')->name('update-company-location');
        Route::post('/company/update-contact', 'updateCompanyContact')->name('update-company-contact');
        Route::post('/company/toggle-status', 'toggleStatus')->name('company.toggleStatus');
        Route::post('/company/add-question', 'store_question')->name('company.add-question');
        Route::post('/company/add-water-conservation-method', 'store_water_conservation_method')->name('company.add-water-conservation-method');
        Route::post('/company/add-water-sources', 'store_water_sources')->name('company.add-water-sources');
        Route::post('/company/remove-question', 'remove_question')->name('company.remove-question');
        Route::post('/company/remove-water-conservation-method', 'remove_water_conservation_method')->name('company.remove-water-conservation-method');
        Route::post('/company/remove-water-sources', 'remove_water_sources')->name('company.remove-water-Sources');
        Route::get('/company/{id}',  'display')->name('company.display');
        // fetch admin details
    });

    Route::controller(RECPController::class)->group(function(){
        // add
        Route::post('/add-area-benefit', 'add_utmost_benefit')->name('admin.add-recp-project');
        Route::post('/add-environmental-benefit', 'add_environmental_benefit')->name('admin.add-recp-environmental');
        Route::post('/add-house-keeping', 'add_house_keeping')->name('admin.add-house-keeping');
        Route::post('/add-waste-reduction-measure', 'add_waste_reduction_measure')->name('admin.add-waste-reduction-measure');
        Route::post('/add-waste-disposal-method', 'add_waste_management_method')->name('admin.add-waste-disposal-method');
        Route::post('/add-product-recovery-measure', 'add_product_recovery_measure')->name('admin.add-product-recovery-measure');
        Route::post('/add-improvement-key-area', 'add_improvement_key_area')->name('admin.add-improvement-key-area');
        Route::post('/add-product-innovation', 'add_product_innovation')->name('admin.add-product-innovation');
        Route::post('/add-hazarduous-material', 'add_hazarduous_material')->name('admin.add-hazarduous-material');
        Route::post('/add-unit-process', 'add_unit_process')->name('admin.add-unit-process');
        Route::post('/add-problem-solution', 'add_problem_solution')->name('admin.add-problem-solution');
        
        // update
        Route::post('/update-improvement-key-area', 'update_improvement_key_area')->name('admin.update-improvement-key-area');
        Route::post('/update-product-innovation', 'update_product_innovation')->name('admin.update-product-innovation');
        Route::post('/update-hazarduous-material', 'update_hazarduous_material')->name('admin.update-hazarduous-material');
        Route::post('/update-unit-process', 'update_unit_process')->name('admin.update-unit-process');
        Route::post('/update-problem-summary', 'update_problem')->name('admin.update-problem-summary');
        Route::post('/update-suggested-solution', 'update_solution')->name('admin.update-suggested-solution');
        
        // remove
        Route::post('/remove-area-benefit', 'remove_utmost_benefit')->name('admin.remove-recp-project');
        Route::post('/remove-environmental-benefit', 'remove_environmetal_benefit')->name('admin.remove-recp-environmental');
        Route::post('/remove-house-keeping', 'remove_house_keeping')->name('admin.remove-house-keeping');
        Route::post('/remove-waste-reduction-measure', 'remove_waste_reduction_measure')->name('admin.remove-waste-reduction-measure');
        Route::post('/remove-waste-disposal-method', 'remove_waste_management_method')->name('admin.remove-waste-disposal-method');
        Route::post('/remove-product-recovery-measure', 'remove_product_recovery_measure')->name('admin.remove-product-recovery-measure');
        Route::post('/remove-improvement-key-area', 'remove_improvement_key_area')->name('admin.remove-improvement-key-area');
        Route::post('/remove-product-innovation', 'remove_product_innovation')->name('admin.remove-product-innovation');
        Route::post('/remove-hazaduous-material', 'remove_hazarduous_material')->name('admin.remove-hazarduous-material');
        Route::post('/remove-unit-process', 'remove_unit_process')->name('admin.remove-unit-process');
        Route::post('/remove-problem-solution', 'remove_problem_solution')->name('admin.remove-problem-solution');
    });

    Route::controller(CompanyMaterialController::class)->group(function(){
        Route::post('/company/material-setup', 'store')->name('admin.save-company-material');
        Route::post('/company/material-setup/price', 'store_price')->name('admin.save-company-material-price');
        Route::get('/material-view/{material}', 'show')->name('admin.view-material');
        Route::get('/stock-analysis', 'getMovements')->name('admin.stock-analysis');
    });

    Route::controller(StockMovementController::class)->group(function(){
        Route::post('/company/material-setup/check-in', 'store_checkin')->name('admin.save-company-material-check-in');
        Route::post('/company/material-setup/check-out', 'store_checkout')->name('admin.save-company-material-check-out');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get ('/create-category', 'create')->name('admin.create-category');
        Route::post ('/store-category', 'store')->name('admin.store-category');
    });

    Route::controller(TeamMemberController::class)->group(function(){
        Route::get ('/team-member', 'index')->name('admin.team-member');
    });

    Route::controller(MapReport::class)->group(function(){
        Route::get ('/companies-map', 'show_all_companies')->name('admin.show-all-companies');
        Route::get ('/all-companies', 'get_all_companies')->name('admin.get-all-companies');
    });

});
