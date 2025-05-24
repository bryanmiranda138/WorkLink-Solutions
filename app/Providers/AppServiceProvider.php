<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Postulante;
use App\Models\Empresa;
use App\Models\Oferta;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $userId = auth()->id();

                // Obtener postulante
                $postulante = Postulante::where('user_id', $userId)->first();

                // Obtener empresa
                $empresa = Empresa::where('user_id', $userId)->first();

                // Obtener una oferta si existe
                $oferta = null;
                if ($empresa) {
                    $oferta = Oferta::where('empresa_id', $empresa->idEmpresa)->get();
                }

                // Compartir variables con todas las vistas
                $view->with(compact('postulante', 'empresa', 'oferta'));
            }
        });
    }
}
