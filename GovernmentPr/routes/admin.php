<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddEventController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AnnualOperationsLogController;
use App\Http\Controllers\CalendarYearController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChemicalStockMovementController;
use App\Http\Controllers\ChemicalsController;
use App\Http\Controllers\CompanyChemicalController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyMaterialController;
use App\Http\Controllers\CompanyOperationController;
use App\Http\Controllers\CompanyWasteController;
use App\Http\Controllers\EmailApp;
use App\Http\Controllers\EmailIntegration;
use App\Http\Controllers\EquipmentTypeController;
use App\Http\Controllers\EquipmentLogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\generalSetting;
use App\Http\Controllers\GuardsController;
use App\Http\Controllers\InventoryForecastingController;
use App\Http\Controllers\MapReport;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OperationTypeController;
use App\Http\Controllers\OperationCategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionLogController;
use App\Http\Controllers\QualityControlController;
use App\Http\Controllers\RealTimeUpdateController;
use App\Http\Controllers\RECPController;
use App\Http\Controllers\ReportingAnalyticsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\StockTradingController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\viewEmailController;
use App\Http\Controllers\WaterSourceDetailsController;
use App\Http\Controllers\WaterUsageLogsController;
use App\Http\Controllers\WaterRecyclingLogsController;
use App\Http\Controllers\WaterQualityLogsController;
use App\Http\Controllers\WaterStockMovementController;
use App\Http\Controllers\WasteDisposalController;
use App\Http\Controllers\ProductionReport;



// Guest Admin Routes
Route::prefix('admin')->middleware('guest:admin')->group(function(){
    Route::controller(AdminsController::class)->group(function () {
        Route::get('/login', 'create_login')->name('admin.login');
        Route::post('/login', 'process_login')->name('admin.login');
        Route::get('/register', 'create_register')->name('admin.register');
        Route::post('/register', 'store')->name('admin.register');
    });
});

// Authenticated Admin Routes
Route::prefix('admin')->middleware('auth:admin')->group(function() {
    // Admin Dashboard and Logout
    Route::controller(AdminsController::class)->group(function(){
        Route::get('/admin-details',  'getAllAdmins')->name('admins.details');
        Route::get('/user-details', 'getAllAdmins')->name('user.details');
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
        Route::get('/users-management', 'index')->name('admin.users-management');
        Route::get('/users-details',  'getAllUsers')->name('users.details');
        Route::post('/view-users',  'store')->name('store-users-details');

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
    
    Route::get('/show-email/{email}', [ViewEmailController::class, 'index'])->name('admin.show-email');
    Route::get('/notifications/{id}', [ViewEmailController::class, 'show'])->name('notifications.show');
    
    //Material
    Route::controller(MaterialController::class)->group(function() {
        Route::get ('/materials', 'index')->name('materials.material');
        Route::post ('/save-material', 'store')->name('admin.store-material');
    }); 

    // Calendar Year
    Route::controller(CalendarYearController::class)->group(function() {
        Route::get('/calendar-year', 'index')->name('admin.calendar-year');
        Route::post('/calendar-year/store', 'store')->name('admin.store-calendar-year');
        Route::get('/calendar-year/{id}', 'show')->name('admin.show-calendar-year');
        Route::put('/calendar-year/{id}', 'update')->name('admin.update-calendar-year');
        Route::delete('/calendar-year/{id}', 'destroy')->name('admin.delete-calendar-year');
    });

    //Chemicals
    Route::controller(ChemicalUsageController::class)->group(function() {
        Route::get ('/chemicals', 'index')->name('chemicals.chemicalUsage');
        Route::post ('/save-chemicals', 'store')->name('admin.store-chemical');
    }); 

    Route::controller(CompanyChemicalController::class)->group(function() {
        Route::post('/save-company-chemical', 'store_company_chemical')->name('admin.store-company-chemical');
        Route::get('/chemical-view/{chemical}', 'show')->name('admin.view-chemical');
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
        Route::post('/company/add-water-usage', 'store_water_usage')->name('company.add-water-usage');
        Route::get('/company/{id}',  'display')->name('company.display');
        // fetch admin details
    });

    // Company Waste
    Route::controller(CompanyWasteController::class)->group(function() {
        Route::get('/waste', 'index')->name('admin.view-waste');
        Route::post('/waste/store', 'store')->name('admin.store-waste');
        Route::get('/waste/{id}', 'show')->name('admin.show-waste');
        Route::put('/waste/{id}', 'update')->name('admin.update-waste');
        Route::delete('/waste/{id}', 'destroy')->name('admin.delete-waste');
    });
    
    // Equipment Log
    Route::controller(EquipmentLogController::class)->group(function() {
        Route::get('/equipment-logs', 'index')->name('admin.equipment-logs');
        Route::post('/equipment-logs', 'store')->name('admin.store-equipment-log');
        Route::get('/equipment-logs/{id}', 'show')->name('admin.show-equipment-log');
        Route::put('/equipment-logs/{id}', 'update')->name('admin.update-equipment-log');
        Route::delete('/equipment-logs/{id}', 'destroy')->name('admin.delete-equipment-log');
    });
    // Equipment Type
    Route::controller(EquipmentTypeController::class)->group(function() {
        Route::get('/equipment-types', 'index')->name('admin.equipment-types');
        Route::post('/equipment-types', 'store')->name('admin.store-equipment-type');
        Route::get('/equipment-types/{id}', 'show')->name('admin.show-equipment-type');
        Route::put('/equipment-types/{id}', 'update')->name('admin.update-equipment-type');
        Route::delete('/equipment-types/{id}', 'destroy')->name('admin.delete-equipment-type');
    });

    // Water Sources Details Route
    Route::controller(WaterSourceDetailsController::class)->group(function() {
        Route::post('/store-water-source-details', 'store')->name('admin.store-water-source-details');
    });
    // Water Usage Logs Route
    Route::controller(WaterUsageLogsController::class)->group(function() {
    Route::post('/store-water-usage-logs', 'store')->name('admin.store-water-usage-logs');
    });
    // Water Recycling Logs Route
    Route::controller(WaterRecyclingLogsController::class)->group(function() {
        Route::post('/store-water-recycling-logs', 'store')->name('admin.store-water-recycling-logs');
    });
    // Water Quality Logs Route
    Route::controller(WaterQualityLogsController::class)->group(function() {
        Route::post('/store-water-quality-logs', 'store')->name('admin.store-water-quality-logs');
    });
    // Waste Disposal Route
    Route::controller(WasteDisposalController::class)->group(function() {
        Route::post('/store-waste-disposal', 'store')->name('admin.store-waste-disposal');
    });
    // annual operations log
    Route::controller(AnnualOperationsLogController::class)->group(function() {
        Route::post('/annual-operations-log/store', 'store')->name('admin.store-annual-operations-log');
    });
    // Quality Control
    Route::controller(QualityControlController::class)->group(function() {
        Route::post('/quality-control/store', 'store')->name('admin.store-quality-control');
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
        
    });

    // Category
    Route::controller(CategoryController::class)->group(function(){
        Route::get ('/create-category', 'create')->name('admin.create-category');
        Route::post ('/store-category', 'store')->name('admin.store-category');
        Route::delete('/delete-category/{id}', 'destroy')->name('admin.delete-category');
    });

    // Chemical Stock Movement
    Route::controller(ChemicalStockMovementController::class)->group(function(){
        Route::post('/company/chemical-setup/check-in', 'store_chemical_checkin')->name('admin.save-company-chemical-check-in');
        Route::post('/company/chemical-setup/check-out', 'store_chemical_checkout')->name('admin.save-company-chemical-check-out');
        Route::get('/chemical-stock-analysis', 'getChemicalStockAnalysis')->name('admin.chemical-stock-analysis');
    });

    // Chemicals
    Route::controller(ChemicalsController::class)->group(function() {
        Route::get('/chemicals', 'create')->name('admin.create-chemical');
        Route::post('/chemicals/store', 'store')->name('admin.store-chemical');
        Route::get('/chemicals/{id}', 'show')->name('admin.show-chemical');
        Route::put('/chemicals/{id}', 'update')->name('admin.update-chemical');
        Route::delete('/chemicals/{id}', 'destroy')->name('admin.delete-chemical');
    });

    Route::controller(CompanyChemicalController::class)->group(function() {
        Route::post('/save-company-chemical', 'store_company_chemical')->name('admin.store-company-chemical');
        Route::get('/chemical-view/{chemical}', 'show')->name('admin.view-chemical');
        Route::post('/company/chemical-setup/price', 'store_price')->name('admin.save-company-chemical-price');
    });

    // Company
    Route::controller(CompanyController::class)->group(function() {
        Route::post('/add-company-objective', 'add_company_objective')->name('admin.add-company-objective');
        Route::post('/add-company-policy', 'add_company_policy')->name('admin.add-company-policy');
        Route::post('/company/add-question', 'store_question')->name('company.add-question');
        Route::post('/company/add-water-conservation-method', 'store_water_conservation_method')->name('company.add-water-conservation-method');
        Route::post('/company/add-water-sources', 'store_water_sources')->name('company.add-water-sources');
        Route::post('/company/add-water-usage', 'store_water_usage')->name('company.add-water-usage');
        Route::post('/company/remove-question', 'remove_question')->name('company.remove-question');
        Route::post('/company/remove-water-conservation-method', 'remove_water_conservation_method')->name('company.remove-water-conservation-method');
        Route::post('/company/remove-water-sources', 'remove_water_sources')->name('company.remove-water-Sources');
        Route::post('/company/toggle-status', 'toggleStatus')->name('company.toggleStatus');
        Route::post('/company/update', 'updateCompanyDetails')->name('update-company-details');
        Route::post('/company/update-contact', 'updateCompanyContact')->name('update-company-contact');
        Route::post('/company/update-location', 'updateCompanyLocation')->name('update-company-location');
        Route::get('/company/{id}',  'display')->name('company.display');
        Route::get('/company/{id}/create-recp', 'create_resp')->name('admin.create-recp');
        Route::get('/create-company', 'create')->name('admin.create-company');
        Route::get('/show-company/{company}', 'show')->name('admin.show-company');
        Route::get('/company', 'index')->name('admin.view-company');
        Route::post('/remove-company-objective', 'remove_company_objective')->name('admin.remove-company-objective');
        Route::post('/remove-company-policy', 'remove_company_policy')->name('admin.remove-company-policy');
        Route::post('/save-company-recp', 'store_recp')->name('admin.store-company-recp');
        Route::post('/save-company', 'store')->name('admin.store-company');
    });

    // Company Material
    Route::controller(CompanyMaterialController::class)->group(function(){
        Route::get('/material-view/{material}', 'show')->name('admin.view-material');
        Route::post('/company/material-setup', 'store')->name('admin.save-company-material');
        Route::post('/company/material-setup/price', 'store_price')->name('admin.save-company-material-price');
    });

    // Company Operation
    Route::controller(CompanyOperationController::class)->group(function(){
        Route::get('/operation', 'index')->name('admin.operation');
        Route::post('/operation/store', 'store')->name('admin.store-operation');
        Route::get('/operation/{id}', 'show')->name('admin.show-operation');
        Route::post('/operation', 'update')->name('admin.update-operation');
        Route::delete('/operation/{id}', 'destroy')->name('admin.delete-operation');
    });

    // Email Application
    Route::controller(EmailApp::class)->group(function() {
        Route::get ('/email-app', 'index')->name('view-email');
        Route::get ('/fetch-user', 'fetch_users')->name('get-user');
        Route::post ('/save-email', 'store')->name('send-mail');
    });

    // Email Integration
    Route::controller(EmailIntegration::class)->group(function() {
        Route::get ('/email', 'index')->name('email-configuration');
    });

    // Events
    Route::controller(EventController::class)->group(function() {
        Route::get ('/cms-events', 'index')->name('CMS.event');
    });
    Route::controller(AddEventController::class)->group(function() {
        Route::get ('/create-events', 'index')->name('CMS.add-event');
    });

    // General Settings
    Route::controller(generalSetting::class)->group(function() {
        Route::get('/general-setting', 'create')->name('admin.general-setting');
        Route::post('/register-settings', 'store')->name('admin.store-settings');
    });

    // Guards
    Route::controller(GuardsController::class)->group(function() {
        Route::post('/guard', 'store')->name('admin.store-guard');
    });

    // Inventory Forecasting
    Route::controller(InventoryForecastingController::class)->group(function() {
        Route::get('/inventory-forecasting', 'index')->name('admin.inventory-forecasting');
    });

    // Map Report
    Route::controller(MapReport::class)->group(function(){
        Route::get ('/all-companies', 'get_all_companies')->name('admin.get-all-companies');
        Route::get ('/companies-map', 'show_all_companies')->name('admin.show-all-companies');
    });

    // Material
    Route::controller(MaterialController::class)->group(function() {
        Route::get ('/materials', 'index')->name('materials.material');
        Route::post ('/save-material', 'store')->name('admin.store-material');
    });

    // Operation Category
    Route::controller(OperationCategoryController::class)->group(function(){
        Route::get('/operation-category', 'index')->name('admin.operation-category');
        Route::post('/operation-category/store', 'store')->name('admin.store-operation-category');
        Route::get('/operation-category/{id}', 'show')->name('admin.show-operation-category');
        Route::put('/operation-category/{id}', 'update')->name('admin.update-operation-category');
        Route::delete('/operation-category/{id}', 'destroy')->name('admin.delete-operation-category');
    });

    // Operation Type
    Route::controller(OperationTypeController::class)->group(function(){
        Route::get('/operation-type', 'index')->name('admin.operation-type');
        Route::post('/operation-type/store', 'store')->name('admin.store-operation-type');
        Route::get('/operation-type/{id}', 'show')->name('admin.show-operation-type');
        Route::put('/operation-type/{id}', 'update')->name('admin.update-operation-type');
        Route::delete('/operation-type/{id}', 'destroy')->name('admin.delete-operation-type');
    });

    // Pages
    Route::controller(PagesController::class)->group(function() {
        Route::get ('/CMS', 'index')->name('CMS.CMS');
    });

    // Permissions
    Route::controller(PermissionsController::class)->group(function() {
        Route::post('/permission', 'store')->name('admin.store-permission');
    });

    // Posts
    Route::controller(PostsController::class)->group(function() {
        Route::get ('/cms-posts', 'index')->name('CMS.posts');
        Route::post ('/save-posts', 'store')->name('admin.store-post');
    });

    // Product
    Route::controller(ProductController::class)->group(function() {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/products/{id}', 'show')->name('admin.show-product');
        Route::post('/products', 'store')->name('admin.store-product');
        Route::put('/products/{id}', 'update')->name('admin.update-product');
        Route::delete('/products/{id}', 'destroy')->name('admin.delete-product');
    });

    // Product Category
    Route::controller(ProductCategoryController::class)->group(function() {
        Route::get('/product-categories', 'index')->name('admin.product-categories');
        Route::get('/product-categories/{id}', 'show')->name('admin.show-product-category');
        Route::post('/product-categories', 'store')->name('admin.store-product-category');
        Route::put('/product-categories/{id}', 'update')->name('admin.update-product-category');
        Route::delete('/product-categories/{id}', 'destroy')->name('admin.delete-product-category');
    });

    // Production Log
    Route::controller(ProductionLogController::class)->group(function() {
        Route::get('/production-logs', 'index')->name('admin.production-logs');
        Route::post('/production-logs', 'store')->name('admin.store-production-log');
        Route::get('/production-logs/{id}', 'show')->name('admin.show-production-log');
        Route::put('/production-logs/{id}', 'update')->name('admin.update-production-log');
        Route::delete('/production-logs/{id}', 'destroy')->name('admin.delete-production-log');
    });
    
    Route::controller(AddPostController::class)->group(function() {
        Route::get ('/cms-Addpost', 'index')->name('CMS.add-post');
    });

    // Real-Time Updates
    Route::controller(RealTimeUpdateController::class)->group(function() {
        Route::get('/real-time-updates', 'index')->name('admin.real-time-updates');
    });

    // RECP
    Route::controller(RECPController::class)->group(function(){
        // Add
        Route::post('/add-area-benefit', 'add_utmost_benefit')->name('admin.add-recp-project');
        Route::post('/add-environmental-benefit', 'add_environmental_benefit')->name('admin.add-recp-environmental');
        Route::post('/add-hazarduous-material', 'add_hazarduous_material')->name('admin.add-hazarduous-material');
        Route::post('/add-house-keeping', 'add_house_keeping')->name('admin.add-house-keeping');
        Route::post('/add-improvement-key-area', 'add_improvement_key_area')->name('admin.add-improvement-key-area');
        Route::post('/add-product-innovation', 'add_product_innovation')->name('admin.add-product-innovation');
        Route::post('/add-product-recovery-measure', 'add_product_recovery_measure')->name('admin.add-product-recovery-measure');
        Route::post('/add-problem-solution', 'add_problem_solutions')->name('admin.add-problem-solution');
        Route::post('/add-unit-process', 'add_unit_process')->name('admin.add-unit-process');
        Route::post('/add-waste-disposal-method', 'add_waste_management_method')->name('admin.add-waste-disposal-method');
        Route::post('/add-waste-reduction-measure', 'add_waste_reduction_measure')->name('admin.add-waste-reduction-measure');
        
        // Update
        Route::post('/update-hazarduous-material', 'update_hazarduous_material')->name('admin.update-hazarduous-material');
        Route::post('/update-improvement-key-area', 'update_improvement_key_area')->name('admin.update-improvement-key-area');
        Route::post('/update-problem-summary', 'update_problem')->name('admin.update-problem-summary');
        Route::post('/update-product-innovation', 'update_product_innovation')->name('admin.update-product-innovation');
        Route::post('/update-suggested-solution', 'update_solution')->name('admin.update-suggested-solution');
        Route::post('/update-unit-process', 'update_unit_process')->name('admin.update-unit-process');
        
        // Remove
        Route::post('/remove-area-benefit', 'remove_utmost_benefit')->name('admin.remove-recp-project');
        Route::post('/remove-environmental-benefit', 'remove_environmetal_benefit')->name('admin.remove-recp-environmental');
        Route::post('/remove-hazaduous-material', 'remove_hazarduous_material')->name('admin.remove-hazarduous-material');
        Route::post('/remove-house-keeping', 'remove_house_keeping')->name('admin.remove-house-keeping');
        Route::post('/remove-improvement-key-area', 'remove_improvement_key_area')->name('admin.remove-improvement-key-area');
        Route::post('/remove-product-innovation', 'remove_product_innovation')->name('admin.remove-product-innovation');
        Route::post('/remove-product-recovery-measure', 'remove_product_recovery_measure')->name('admin.remove-product-recovery-measure');
        Route::post('/remove-problem-solution', 'remove_problem_solution')->name('admin.remove-problem-solution');
        Route::post('/remove-unit-process', 'remove_unit_process')->name('admin.remove-unit-process');
        Route::post('/remove-waste-disposal-method', 'remove_waste_management_method')->name('admin.remove-waste-disposal-method');
        Route::post('/remove-waste-reduction-measure', 'remove_waste_reduction_measure')->name('admin.remove-waste-reduction-measure');
    });

    // Inventory Reporting and Analytics
    Route::controller(ReportingAnalyticsController::class)->group(function() {
        Route::get('/reporting-analytics', 'index')->name('admin.reporting-analytics');
        Route::get('/reporting-analytics/stock-performance', 'getStockPerformance')->name('admin.stock-performance');
        Route::get('/reporting-analytics/trading-summary', 'getTradingSummary')->name('admin.trading-summary');
        Route::get('/reporting-analytics/user-activity', 'getUserActivity')->name('admin.user-activity');
    });

    // Production Report
    Route::controller(ProductionReport::class)->group(function() {
        Route::get('/production-report', 'index')->name('admin.production-report');
        Route::post('/production-report/store', 'store')->name('admin.store-production-report');
        Route::get('/production-report/{id}', 'show')->name('admin.show-production-report');
        Route::put('/production-report/{id}', 'update')->name('admin.update-production-report');
        Route::delete('/production-report/{id}', 'destroy')->name('admin.delete-production-report');
    });

    // Roles
    Route::controller(RolesController::class)->group(function(){
        Route::post('/settings/assign_role_has_permission', 'assign_role_permission')->name('admin.update.permission-role');
        Route::post('/settings/fetch-role-permission', 'get_role_permission')->name('admin.fetch.role-permission');
        Route::post('/settings/revoke_role_has_permission', 'revoke_role_permission')->name('admin.revoke.permission-role');
        Route::post('/settings/role-change', 'guard_change')->name('admin.guard-change');
        Route::post('/settings/role', 'store')->name('admin.store-role');
        Route::get('/settings/role', 'index')->name('admin.display-roles');
    });

    // Stock Movement
    Route::controller(StockMovementController::class)->group(function(){
        Route::post('/company/material-setup/check-in', 'store_checkin')->name('admin.save-company-material-check-in');
        Route::post('/company/material-setup/check-out', 'store_checkout')->name('admin.save-company-material-check-out');
        Route::get('/material-stock-analysis', 'MaterialStockAnalysis')->name('admin.material-stock-analysis');
    });

    // Stock Trading
    Route::controller(StockTradingController::class)->group(function() {
        Route::post('/stock-trading/buy', 'buyStock')->name('admin.buy-stock');
        Route::post('/stock-trading/sell', 'sellStock')->name('admin.sell-stock');
        Route::get('/stock-trading/history', 'getTradingHistory')->name('admin.trading-history');
        Route::get('/stock-trading', 'index')->name('admin.stock-trading');
    });

    // Water Stock Movement
    Route::controller(WaterStockMovementController::class)->group(function() {
        Route::post('/water-stock/check-in', 'store_water_checkin')->name('admin.water-stock-check-in');
        Route::post('/water-stock/check-out', 'store_water_checkout')->name('admin.water-stock-check-out');
        Route::post('/water-stock/recycling-log', 'store_water_recycling_log')->name('admin.water-stock-recycling-log');
        Route::get('/water-stock-analysis', 'getWaterStockAnalysis')->name('admin.water-stock-analysis');
    });

    // Team Member
    Route::controller(TeamMemberController::class)->group(function(){
        Route::get ('/team-member', 'index')->name('admin.team-member');
    });

    // Users Management
    // Route::controller(UsersManagementController::class)->group(function(){
    //     Route::post('/view-users',  'store')->name('view.details');
    //     Route::get('/users-details',  'getAllUsers')->name('users.details');
    //     Route::get('/users-management', 'show_usersmanagement')->name('admin.users-management');
    // });

    // View Email
    Route::get('/notifications/{id}', [ViewEmailController::class, 'show'])->name('notifications.show');
    Route::get('/show-email/{email}', [ViewEmailController::class, 'index'])->name('admin.show-email');
    
});
