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

Route::get('/', [
    'as' => 'index', 'uses' => 'MainController@index'
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
    });
});
