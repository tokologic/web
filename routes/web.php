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

//Route::middleware(['cashier'])->group(function () {
    Route::prefix('cashier')->name('cashier.')->group(function() {
        Route::get('dashboard', function(){
            return view('cashier.dashboard');
        })->name('dashboard');
        Route::get('neworder', function(){
            return view('cashier.neworder');
        })->name('neworder');
        Route::get('previousorder', function(){
            return view('cashier.previousorder');
        })->name('previousorder');
        Route::get('purchaseorder', function(){
            return view('cashier.purchaseorder');
        })->name('purchaseorder');
        Route::get('newpo', function(){
            return view('cashier.newpo');
        })->name('newpo');
        Route::get('newpoitem', function(){
            return view('cashier.newpoitem');
        });
    });
//});

Route::middleware(['auth'])->group(function () {

    Route::match(['get', 'delete'], '/logout', 'Auth\LoginController@logout');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    Route::get('suppliers/select', 'SupplierController@select2')->name('suppliers.select');
    Route::get('warehouses/select', 'WarehouseController@select2')->name('warehouses.select');
    Route::get('products/select', 'ProductsController@select2')->name('products.select');
    Route::get('stalls/select', 'StallController@select2')->name('stalls.select');

    Route::resource('users', 'UsersController');
    Route::resource('midwives', 'MidwivesController');
    Route::resource('warehousers', 'WarehousersController');
    Route::resource('brands', 'BrandsController');
    Route::resource('companies', 'CompaniesController');
    Route::resource('brands.products', 'ProductsController');
    Route::resource('categories', 'CategoryController');
    Route::resource('regions', 'RegionController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('warehouses', 'WarehouseController');
    Route::post('stalls/{stall}/approve', 'StallController@approve')->name('stalls.approve');
    Route::get('stalls/{stall}/pay', 'StallController@pay')->name('stalls.pay');
    Route::resource('stalls', 'StallController');
    Route::resource('prices', 'PricesController');
    Route::resource('warehouses.stocks', 'StocksController');
    Route::resource('stallitem', 'StallItemController');

    Route::namespace('Stall')->group(function () {
        Route::prefix('stall/purchase-orders')->name('stalls.po.')->group(function () {
            Route::get('/', 'PurchaseOrdersController@index')->name('index');
            Route::post('/', 'PurchaseOrdersController@store')->name('store');
            Route::get('create', 'PurchaseOrdersController@create')->name('create');
            Route::get('{po}', 'PurchaseOrdersController@show')->name('show');
            Route::delete('{po}', 'PurchaseOrdersController@destroy')->name('destroy');
            Route::put('{po}/status', 'PurchaseOrdersController@status')->name('status');

            Route::prefix('{po}/items')->name('item.')->group(function () {
                Route::post('/', 'PurchaseOrderItemsController@store')->name('store');
                Route::get('create', 'PurchaseOrderItemsController@create')->name('create');
                Route::put('{item}', 'PurchaseOrderItemsController@update')->name('update');
                Route::delete('{item}', 'PurchaseOrderItemsController@destroy')->name('destroy');
                Route::get('{item}/edit', 'PurchaseOrderItemsController@edit')->name('edit');
            });
        });
        Route::prefix('stall/goods-receiving')->name('stalls.gr.')->group(function () {
            Route::get('/', 'GoodsReceivesController@index')->name('index');
            Route::post('/', 'GoodsReceivesController@store')->name('store');
            Route::get('create', 'GoodsReceivesController@create')->name('create');
            Route::get('{po}', 'GoodsReceivesController@show')->name('show');

            Route::prefix('{po}/items')->name('item.')->group(function () {
                Route::post('/', 'GoodsReceiveItemsController@store')->name('store');
                Route::get('data-tables', 'GoodsReceiveItemsController@dataTables')->name('datatables');
                Route::get('create', 'GoodsReceiveItemsController@create')->name('create');

            });
        });
    });

    Route::namespace('Warehouse')->group(function () {
        Route::prefix('warehouse/purchase-orders')->name('warehouse.po.')->group(function () {

            Route::get('/', 'PurchaseOrdersController@index')->name('index');
            Route::post('/', 'PurchaseOrdersController@store')->name('store');
            Route::get('create', 'PurchaseOrdersController@create')->name('create');
            Route::get('{po}', 'PurchaseOrdersController@show')->name('show');
            Route::delete('{po}', 'PurchaseOrdersController@destroy')->name('destroy');
            Route::get('{po}/edit', 'PurchaseOrdersController@edit')->name('edit');
            Route::put('{po}/status', 'PurchaseOrdersController@status')->name('status');

            Route::prefix('{po}/items')->name('item.')->group(function () {
                Route::post('/', 'PurchaseOrderItemsController@store')->name('store');
                Route::get('create', 'PurchaseOrderItemsController@create')->name('create');
                Route::put('{item}', 'PurchaseOrderItemsController@update')->name('update');
                Route::delete('{item}', 'PurchaseOrderItemsController@destroy')->name('destroy');
                Route::get('{item}/edit', 'PurchaseOrderItemsController@edit')->name('edit');
            });
        });

        Route::prefix('warehouse/goods-receiving')->name('warehouse.gr.')->group(function () {
            Route::get('/', 'GoodsReceivesController@index')->name('index');
            Route::post('/', 'GoodsReceivesController@store')->name('store');
            Route::get('create', 'GoodsReceivesController@create')->name('create');
            Route::get('{po}', 'GoodsReceivesController@show')->name('show');

            Route::prefix('{po}/items')->name('item.')->group(function () {
                Route::post('/', 'GoodsReceiveItemsController@store')->name('store');
                Route::get('data-tables', 'GoodsReceiveItemsController@dataTables')->name('datatables');
                Route::get('create', 'GoodsReceiveItemsController@create')->name('create');

            });
        });
    });

    Route::namespace('Sale')->group(function () {
        Route::prefix('sales')->name('sales.')->group(function () {
            Route::get('update-qty', 'SalesController@updateQuantity')->name('update-qty');
            Route::get('checkout', 'SalesController@checkout')->name('checkout');
            Route::get('previous', 'SalesController@previous')->name('previous');
            Route::get('/', 'SalesController@index')->name('index');
            Route::post('/', 'SalesController@store')->name('store');
            Route::get('create', 'SalesController@create')->name('create');
            Route::get('{sale}', 'SalesController@show')->name('show');

            Route::prefix('{sale}/items')->name('item.')->group(function () {
                Route::post('/', 'SaleItemController@store')->name('store');
                Route::get('create', 'SaleItemController@create')->name('create');
                Route::put('{item}', 'SaleItemController@update')->name('update');
                Route::get('{item}/edit', 'SaleItemController@edit')->name('edit');
                Route::delete('{item}', 'SaleItemController@destroy')->name('destroy');
            });
        });
    });
});
