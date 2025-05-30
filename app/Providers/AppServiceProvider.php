<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Postulante;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Postulacion;

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
                $ofertasSameId = null;
                $oferta = null;
                if ($empresa) {
                    $ofertasSameId = Oferta::where('empresa_id', $empresa->idEmpresa)->get();
                    $oferta = Oferta::where('empresa_id', $empresa->idEmpresa)->first();
                }

                $ofertas = Oferta::all();   
                
                $postulacion = null;
                if ($oferta) {
                    $postulacion = Postulacion::where('user_id', $userId)
                        ->where('oferta_id', $oferta->idOferta)
                        ->first();
                }

                $postulaciones = Postulacion::all();
                
                // Compartir variables con todas las vistas
                $view->with(compact('postulante', 'empresa', 'oferta', 'ofertas', 
                    'ofertasSameId', 'postulacion', 'postulaciones'));
            }
        });
    }
}
