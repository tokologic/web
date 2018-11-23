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
    Route::get('suppliers/select', 'SupplierController@select2')->name('suppliers.select');
    Route::get('warehouses/select', 'WarehouseController@select2')->name('warehouses.select');
    Route::get('products/select', 'ProductsController@select2')->name('products.select');

    Route::resource('prices', 'PricesController');

//    Route::resource('wh/purchase-orders', 'Warehouse\PurchaseOrdersController');
    Route::get('purchase-orders', 'Warehouse\PurchaseOrdersController@index')->name('warehouse.po.index');
    Route::get('purchase-orders/create', 'Warehouse\PurchaseOrdersController@create')->name('warehouse.po.create');
    Route::post('purchase-orders', 'Warehouse\PurchaseOrdersController@store')->name('warehouse.po.store');
    Route::get('purchase-orders/{po}/edit', 'Warehouse\PurchaseOrdersController@edit')->name('warehouse.po.edit');
    Route::get('purchase-orders/{po}', 'Warehouse\PurchaseOrdersController@show')->name('warehouse.po.show');
    Route::delete('purchase-orders/{po}', 'Warehouse\PurchaseOrdersController@edit')->name('warehouse.po.destroy');

    Route::get('purchase-orders/{po}/create', 'Warehouse\PurchaseOrderItemsController@create')->name('warehouse.po.item.create');
    Route::post('purchase-orders/{po}', 'Warehouse\PurchaseOrderItemsController@store')->name('warehouse.po.item.store');

});
