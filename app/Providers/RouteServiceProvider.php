<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->router->group([
            'namespace' => 'App\Http\Controllers',
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }
}
