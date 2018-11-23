<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapPosRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        \Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        if (\App::environment(['production', 'staging'])) {
            $route = \Route::domain('api.' . config('app.domain'));
        } else {
            $route = \Route::prefix('api');
        }

        $route->middleware('api')
            ->namespace('Api\Http\Controllers')
            ->group(base_path('api/routes/api.php'));

    }

    protected function mapPosRoutes()
    {
        if (\App::environment(['production', 'staging'])) {
            $route = \Route::domain('pos.' . config('app.domain'));
        } else {
            $route = \Route::prefix('pos');
        }

        $route->middleware('web')
            ->namespace('Pos\Http\Controllers')
            ->group(base_path('pos/routes/pos.php'));
    }
}
