<?php

namespace App\Providers;

use App\Models\Eventos;
use App\Models\Usuarios;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        $eventosTotal = Eventos::all();
        view()->share('eventosTotal', $eventosTotal);


        $usuariosTotal = Usuarios::all();
        view()->share('usuariosTotal', $usuariosTotal);
        
        $cart =  session('cart');
        view()->share('cart', $cart);

        $total = session('totalCart');
    
        view()->share('total', $total );

      
    }
}
