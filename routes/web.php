<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\EmpresaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/postulante', function () {
    return redirect()->route('postulantes.index');
});

Route::resource('postulantes', PostulanteController::class);

Route::get('/empresa', function () {
    return redirect()->route('empresas.index');
});

Route::resource('empresas', EmpresaController::class);