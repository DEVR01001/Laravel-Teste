<?php

namespace App\Providers;

use App\Models\Chair;
use App\Models\Event;
use App\Models\User;
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
        

        $quantEventos =  Event::count();
        view()->share('quantEventos', $quantEventos);

       




        // Cadeiras

        $quantChairsDisponiveis = Chair::where('status_chair', 'available')->count();
        view()->share('quantChairsDisponiveis', $quantChairsDisponiveis);

        $quantChairsNãoDisponiveis = Chair::where('status_chair', 'occupied')->count();
        view()->share('quantChairsNãoDisponiveis', $quantChairsNãoDisponiveis);

        $quantChairsNãoVips = Chair::where('level_chair', 'vip')->count();
        view()->share('quantChairsNãoVips', $quantChairsNãoVips);

        $quantChairsNãoComum = Chair::where('level_chair', 'common')->count();
        view()->share('quantChairsNãoComum', $quantChairsNãoComum);




        // USUARIOS

        $quantUsuarios = User::count();
        view()->share('quantUsuarios', $quantUsuarios);

        $quantUsuariosAdm = User::where('profile', 'admin')->count();
        view()->share('quantUsuariosAdm', $quantUsuariosAdm);

        $quantUsuariosClient = User::where('profile', 'client')->count();
        view()->share('quantUsuariosClient', $quantUsuariosClient);

        $quantUsuariosTotem= User::where('profile', 'totem')->count();
        view()->share('quantUsuariosTotem', $quantUsuariosTotem);

        $quantUsuariosSaller = User::where('profile', 'saller')->count();
        view()->share('quantUsuariosSaller', $quantUsuariosSaller);




    }
}
