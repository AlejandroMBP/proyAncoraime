<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\FuncionarioController;
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
// rutas para cargo
    Route::get('/cargos', [CargoController::class, 'index'])->name('administrador.cargos.listar');
    Route::post('/cargos/editar',[CargoController::class,'editarCargo'])->name('administrador.cargos.listar');
    Route::post('/cargos/agregar',[CargoController::class,'agregarCargo'])->name('administrador.cargos.listar');
    Route::post('/cargos/editarEstado/{id}',[CargoController::class,'editarEstadoCargo'])->name('administrador.cargos.listar');

    Route::resource('/cargos', CargoController::class);

// rutas para funcionario
    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('administrador.funcionarios.listarFu');
    Route::post('/funcionarios/editar',[FuncionarioController::class,'editarFuncionario'])->name('administrador.funcionarios.listarFu');
    Route::post('/funcionarios/agregar',[FuncionarioController::class,'agregarFuncionario'])->name('administrador.funcionarios.listarFu');
    Route::post('/funcionarios/editarEstado/{id}',[FuncionarioController::class,'editarEstadoFuncionario'])->name('administrador.funcionarios.listarFu');

    Route::resource('/funcionarios', FuncionarioController::class);
});


require __DIR__ . '/auth.php';
