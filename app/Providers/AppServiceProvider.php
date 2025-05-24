<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Postulante;
use App\Models\Empresa;

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
                $postulante = Postulante::where('user_id', auth()->id())->first();
                $view->with('postulante', $postulante);
            }
        });

        View::composer('*', function ($view) {
            if (auth()->check()) {
                $empresa = Empresa::where('user_id', auth()->id())->first();
                $view->with('empresa', $empresa);
            }
        });
    }
}
