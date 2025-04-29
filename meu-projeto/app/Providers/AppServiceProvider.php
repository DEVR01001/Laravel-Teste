<?php

namespace App\Providers;

use App\Repositories\SuporteEloquentORM;
use App\Repositories\SuporteRepositoryInterface;
use App\Repository\SuporteEloquentORM as RepositorySuporteEloquentORM;
use App\Repository\SuporteRepositoryInterface as RepositorySuporteRepositoryInterface;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            RepositorySuporteRepositoryInterface::class, 
           RepositorySuporteEloquentORM::class 
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
