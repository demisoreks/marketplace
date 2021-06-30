<?php

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
Route::get('configuration', [
    'as' => 'configuration', 'uses' => 'ConfigurationController@index'
]);
Route::post('configuration/store', [
    'as' => 'configuration.store', 'uses' => 'ConfigurationController@store'
]);

Route::middleware('check.config')->group(function () {
    Route::get('/', [
        'as' => 'index', 'uses' => 'MainController@index'
    ]);

    Route::get('category/{category}', [
        'as' => 'category', 'uses' => 'MainController@category'
    ]);

    Route::get('enquiry', [
        'as' => 'enquiry', 'uses' => 'MainController@enquiry'
    ]);

    Route::prefix('admin')->group(function () {
        Route::get('/', [
            'as' => 'admin_index', 'uses' => 'AdminMainController@index'
        ]);
        Route::post('authenticate', [
            'as' => 'admin_authenticate', 'uses' => 'AdminAuthenticateController@authenticate'
        ]);
        Route::get('logout', [
            'as' => 'admin_logout', 'uses' => 'AdminAuthenticateController@logout'
        ]);
        Route::middleware('check.admin')->group(function () {
            Route::get('dashboard', [
                'as' => 'admin_dashboard', 'uses' => 'AdminMainController@dashboard'
            ]);

            Route::get('configuration', [
                'as' => 'configuration.edit', 'uses' => 'ConfigurationController@edit'
            ]);
            Route::put('configuration/update', [
                'as' => 'configuration.update', 'uses' => 'ConfigurationController@update'
            ]);

            Route::resource('administrators', 'AdministratorsController');
            Route::get('administrators/{administrator}/disable', [
                'as' => 'administrators.disable', 'uses' => 'AdministratorsController@disable'
            ]);
            Route::get('administrators/{administrator}/enable', [
                'as' => 'administrators.enable', 'uses' => 'AdministratorsController@enable'
            ]);
            Route::bind('administrators', function ($value, $route) {
                return App\DAdministrator::findBySlug($value)->first();
            });

            Route::resource('categories', 'CategoriesController');
            Route::get('categories/{category}/disable', [
                'as' => 'categories.disable', 'uses' => 'CategoriesController@disable'
            ]);
            Route::get('categories/{category}/enable', [
                'as' => 'categories.enable', 'uses' => 'CategoriesController@enable'
            ]);
            Route::bind('categories', function ($value, $route) {
                return App\DCategory::findBySlug($value)->first();
            });

            Route::resource('versions', 'VersionsController');
            Route::get('versions/{version}/disable', [
                'as' => 'versions.disable', 'uses' => 'VersionsController@disable'
            ]);
            Route::get('versions/{version}/enable', [
                'as' => 'versions.enable', 'uses' => 'VersionsController@enable'
            ]);
            Route::bind('versions', function ($value, $route) {
                return App\DVersion::findBySlug($value)->first();
            });

            Route::resource('billing_intervals', 'BillingIntervalsController');
            Route::get('billing_intervals/{billing_interval}/disable', [
                'as' => 'billing_intervals.disable', 'uses' => 'BillingIntervalsController@disable'
            ]);
            Route::get('billing_intervals/{billing_interval}/enable', [
                'as' => 'billing_intervals.enable', 'uses' => 'BillingIntervalsController@enable'
            ]);
            Route::bind('billing_intervals', function ($value, $route) {
                return App\DBillingInterval::findBySlug($value)->first();
            });

            Route::resource('vendors', 'VendorsController');
            Route::get('vendors/{vendor}/disable', [
                'as' => 'vendors.disable', 'uses' => 'VendorsController@disable'
            ]);
            Route::get('vendors/{vendor}/enable', [
                'as' => 'vendors.enable', 'uses' => 'VendorsController@enable'
            ]);
            Route::bind('vendors', function ($value, $route) {
                return App\DVendor::findBySlug($value)->first();
            });

            Route::resource('languages', 'LanguagesController');
            Route::get('languages/{language}/disable', [
                'as' => 'languages.disable', 'uses' => 'LanguagesController@disable'
            ]);
            Route::get('languages/{language}/enable', [
                'as' => 'languages.enable', 'uses' => 'LanguagesController@enable'
            ]);
            Route::bind('languages', function ($value, $route) {
                return App\DLanguage::findBySlug($value)->first();
            });

            Route::resource('products', 'ProductsController');
            Route::get('products/{product}/disable', [
                'as' => 'products.disable', 'uses' => 'ProductsController@disable'
            ]);
            Route::get('products/{product}/enable', [
                'as' => 'products.enable', 'uses' => 'ProductsController@enable'
            ]);
            Route::bind('products', function ($value, $route) {
                return App\DProduct::findBySlug($value)->first();
            });

            Route::resource('products.product_categories', 'ProductCategoriesController');
            Route::bind('product_categories', function ($value, $route) {
                return App\DProductCategory::findBySlug($value)->first();
            });

            Route::resource('products.product_requirements', 'ProductRequirementsController');
            Route::bind('product_requirements', function ($value, $route) {
                return App\DProductRequirement::findBySlug($value)->first();
            });

            Route::resource('products.product_features', 'ProductFeaturesController');
            Route::bind('product_features', function ($value, $route) {
                return App\DProductFeature::findBySlug($value)->first();
            });

            Route::resource('products.product_languages', 'ProductLanguagesController');
            Route::bind('product_languages', function ($value, $route) {
                return App\DProductLanguage::findBySlug($value)->first();
            });

            Route::resource('products.product_versions', 'ProductVersionsController');
            Route::bind('product_versions', function ($value, $route) {
                return App\DProductVersion::findBySlug($value)->first();
            });

            Route::resource('products.product_plans', 'ProductPlansController');
            Route::bind('product_plans', function ($value, $route) {
                return App\DProductPlan::findBySlug($value)->first();
            });

            Route::resource('products.product_faqs', 'ProductFaqsController');
            Route::bind('product_faqs', function ($value, $route) {
                return App\DProductFaq::findBySlug($value)->first();
            });
        });
    });

    Route::prefix('pos')->group(function () {
        Route::get('/', [
            'as' => 'pos_index', 'uses' => 'PosMainController@index'
        ]);
        Route::post('authenticate', [
            'as' => 'pos_authenticate', 'uses' => 'PosAuthenticateController@authenticate'
        ]);
        Route::get('logout', [
            'as' => 'pos_logout', 'uses' => 'PosAuthenticateController@logout'
        ]);
        Route::get('register', [
            'as' => 'pos_register', 'uses' => 'PosMainController@register'
        ]);
        Route::post('pos_create_account', [
            'as' => 'pos_create_account', 'uses' => 'PosMainController@create_account'
        ]);
        Route::middleware('check.reseller')->group(function () {
            Route::get('dashboard', [
                'as' => 'pos_dashboard', 'uses' => 'PosMainController@dashboard'
            ]);

            Route::resource('customers', 'PosCustomersController', [
                'as' => 'pos'
            ]);

            Route::get('sales/new/{customer_id}', [
                'as' => 'pos.sales.new', 'uses' => 'PosSalesController@new'
            ]);
            Route::get('sales/{sale}/currency/{currency}', [
                'as' => 'pos.sales.currency', 'uses' => 'PosSalesController@currency'
            ]);
            Route::get('sales/{sale}/add/{product_id}', [
                'as' => 'pos.sales.add', 'uses' => 'PosSalesController@add'
            ]);
            Route::get('sales/{sales_item}/increase', [
                'as' => 'pos.sales.increase', 'uses' => 'PosSalesController@increase'
            ]);
            Route::get('sales/{sales_item}/reduce', [
                'as' => 'pos.sales.reduce', 'uses' => 'PosSalesController@reduce'
            ]);
            Route::get('sales/{sales_item}/remove', [
                'as' => 'pos.sales.remove', 'uses' => 'PosSalesController@remove'
            ]);
            Route::post('sales/{sale}/checkout', [
                'as' => 'pos.sales.checkout', 'uses' => 'PosSalesController@checkout'
            ]);
            Route::resource('sales', 'PosSalesController', [
                'as' => 'pos'
            ]);
        });
    });
});
