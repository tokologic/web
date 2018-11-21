<?php

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

Route::get('/', function () {

    if (Sentinel::check()) {
        return redirect()->to('dashboard');
    }

    return redirect()->to('login');
})->name('root');

Route::middleware(['guest'])->group(function () {

    Route::get('/login', 'Auth\LoginController@index');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'delete'], '/logout', 'Auth\LoginController@logout');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('users', 'UsersController');
    Route::resource('midwives', 'MidwivesController');
    Route::resource('brands', 'BrandsController');
    Route::resource('companies', 'CompaniesController');
    Route::resource('brands.products', 'ProductsController');

    Route::resource('prices', 'PricesController');

    Route::get('purchase-orders', 'Warehouse\PurchaseOrdersController@index')->name('warehouse.po.index');
    Route::get('purchase-orders/create', 'Warehouse\PurchaseOrdersController@create')->name('warehouse.po.create');
});
