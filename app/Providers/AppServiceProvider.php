<?php

namespace API\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function register()
    {
        $this->app->bind('API\Repositories\Contracts\AuthenticateRepositoryInterface', 'API\Repositories\AuthenticateRepository');
        $this->app->bind('API\Repositories\Contracts\UserRepositoryInterface', 'API\Repositories\UserRepository');

        $this->app->bind('API\Repositories\Contracts\MonitoramentoRepositoryInterface', 'API\Repositories\MonitoramentoRepository');

    }
}
