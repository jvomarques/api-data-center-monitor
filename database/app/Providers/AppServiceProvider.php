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
        $this->app->bind('API\Repositories\Contracts\ServicosRepositoryInterface', 'API\Repositories\ServicosRepository');
        $this->app->bind('API\Repositories\Contracts\CidadesRepositoryInterface', 'API\Repositories\CidadesRepository');
        $this->app->bind('API\Repositories\Contracts\BairrosRepositoryInterface', 'API\Repositories\BairrosRepository');
        $this->app->bind('API\Repositories\Contracts\CoresRepositoryInterface', 'API\Repositories\CoresRepository');
        $this->app->bind('API\Repositories\Contracts\MarcasRepositoryInterface', 'API\Repositories\MarcasRepository');
        $this->app->bind('API\Repositories\Contracts\ModelosRepositoryInterface', 'API\Repositories\ModelosRepository');
        $this->app->bind('API\Repositories\Contracts\VeiculosRepositoryInterface', 'API\Repositories\VeiculosRepository');
        $this->app->bind('API\Repositories\Contracts\MontadorasRepositoryInterface', 'API\Repositories\MontadorasRepository');
        $this->app->bind('API\Repositories\Contracts\OficinasRepositoryInterface', 'API\Repositories\OficinasRepository');
        $this->app->bind('API\Repositories\Contracts\CategoriasRepositoryInterface', 'API\Repositories\CategoriasRepository');
        $this->app->bind('API\Repositories\Contracts\ComissoesRepositoryInterface', 'API\Repositories\ComissoesRepository');
        $this->app->bind('API\Repositories\Contracts\AtendimentosRepositoryInterface', 'API\Repositories\AtendimentosRepository');
        $this->app->bind('API\Repositories\Contracts\AvaliacoesRepositoryInterface', 'API\Repositories\AvaliacoesRepository');
        $this->app->bind('API\Repositories\Contracts\SituacoesRepositoryInterface', 'API\Repositories\SituacoesRepository');
        $this->app->bind('API\Repositories\Contracts\AtendimentosServicosRepositoryInterface', 'API\Repositories\AtendimentosServicosRepository');
        $this->app->bind('API\Repositories\Contracts\AtendimentosOficinasRepositoryInterface', 'API\Repositories\AtendimentosOficinasRepository');
        $this->app->bind('API\Repositories\Contracts\OficinasMontadorasRepositoryInterface', 'API\Repositories\OficinasMontadorasRepository');
        $this->app->bind('API\Repositories\Contracts\OficinasServicosRepositoryInterface', 'API\Repositories\OficinasServicosRepository');
    }
}
