<?php

namespace App\Providers;

use App\Model\Brand;
use App\Model\Company;
use App\Model\Product;
use App\Model\User;
use App\Observers\BrandObserver;
use App\Observers\CompanyObserver;
use App\Observers\ProductObserver;
use App\Observers\UserObserver;
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
        $this->logQuery();
        $this->observeModel();
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
    }

    private function logQuery(): void
    {
        \Event::listen(QueryExecuted::class, function ($query) {
            \Log::debug($query->sql . '. Bindings [' . implode(', ', $query->bindings) . ']. Time ' . $query->time . ' s');
        });
    }
}
