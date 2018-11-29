<?php

namespace App\Providers;

use App\Model\Brand;
use App\Model\Company;
use App\Model\Product;
use App\Model\Role;
use App\Model\User;
use App\Model\Warehouse\GoodsReceiveItem;
use App\Model\Warehouse\PurchaseOrderItem;
use App\Model\Warehouse\StockItem;
use App\Observers\BrandObserver;
use App\Observers\CompanyObserver;
use App\Observers\ProductObserver;
use App\Observers\RoleObserver;
use App\Observers\UserObserver;
use App\Observers\Warehouse\GoodsReceiveItemObserver;
use App\Observers\Warehouse\PurchaseOrderItemObserver;
use App\Observers\Warehouse\StockItemObserver;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # https://laravel-news.com/laravel-5-4-key-too-long-error
        \Schema::defaultStringLength(191);

        $this->observeModel();
        $this->logQuery();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function observeModel(): void
    {
        Brand::observe(BrandObserver::class);
        Company::observe(CompanyObserver::class);
        Product::observe(ProductObserver::class);
        User::observe(UserObserver::class);
        Role::observe(RoleObserver::class);
        PurchaseOrderItem::observe(PurchaseOrderItemObserver::class);
        GoodsReceiveItem::observe(GoodsReceiveItemObserver::class);
        StockItem::observe(StockItemObserver::class);
    }

    private function logQuery(): void
    {
        \Event::listen(QueryExecuted::class, function ($query) {
            \Log::debug($query->sql . '. Bindings [' . implode(', ', $query->bindings) . ']. Time ' . $query->time . ' s');
        });
    }
}
