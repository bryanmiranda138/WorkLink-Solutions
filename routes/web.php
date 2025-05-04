<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

/**General user routes **/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'generalUserDashboard'])->name('dashboard');
    Route::get('/dashboard/postulantes', [PostulanteController::class, 'index'])->name('postulantes.index');
    Route::get('/dashboard/postulantes/create', [PostulanteController::class, 'create'])->name('postulantes.create');
    Route::get('/dashboard/postulantes/edit', [PostulanteController::class, 'edit'])->name('postulantes.edit');
    Route::get('/dashboard/postulantes/store', [PostulanteController::class, 'store'])->name('postulantes.store');
});

/**Admin routes **/
Route::middleware('adminAuth')->prefix('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('adminDashboardShow');
    Route::get('/dashboard/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
    Route::get('/dashboard/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
    Route::get('/dashboard/empresas/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
    Route::get('/dashboard/empresas/store', [EmpresaController::class, 'store'])->name('empresas.store');
});

/**Super Admin routes **/
Route::middleware('superAdminAuth')->prefix('superAdmin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'superAdminDashboard'])->name('superAdminDashboardShow');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
