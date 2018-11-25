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
    Route::resource('categories', 'CategoryController');
    Route::resource('regions', 'RegionController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('warehouses', 'WarehouseController');
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
    Route::delete('purchase-orders/{po}', 'Warehouse\PurchaseOrdersController@destroy')->name('warehouse.po.destroy');
    Route::put('purchase-orders/{po}/status', 'Warehouse\PurchaseOrdersController@status')->name('warehouse.po.status');

    Route::get('purchase-orders/{po}/items/create', 'Warehouse\PurchaseOrderItemsController@create')->name('warehouse.po.item.create');
    Route::post('purchase-orders/{po}/items', 'Warehouse\PurchaseOrderItemsController@store')->name('warehouse.po.item.store');
    Route::get('purchase-orders/{po}/items/{item}/edit', 'Warehouse\PurchaseOrderItemsController@edit')->name('warehouse.po.item.edit');
    Route::put('purchase-orders/{po}/items/{item}', 'Warehouse\PurchaseOrderItemsController@update')->name('warehouse.po.item.update');
    Route::delete('purchase-orders/{po}/items/{item}', 'Warehouse\PurchaseOrderItemsController@destroy')->name('warehouse.po.item.destroy');

});
