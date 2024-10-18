<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\metricascontroller;
use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('Administrador.app');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/metricas', [metricascontroller::class, 'index'])->name('metricas.index'); // ruta que remplaza a dashboard ahora se llama metricas

//rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    ///
    Route::get('/cargos',[CargoController::class,'index'])->name('administrador.cargos.listar');
    Route::get('/cargos',[CargoController::class,'modificar'])->name('administrador.cargos.modificar');
    Route::get('/cargos',[CargoController::class,'eliminar'])->name('administrador.cargos.eliminar');
});



require __DIR__ . '/auth.php';
