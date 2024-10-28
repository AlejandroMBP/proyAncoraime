<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\documentosController;
use App\Http\Controllers\impresionesController;
use App\Http\Controllers\metricascontroller;
use App\Http\Controllers\prestamosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\tipoDocumentoController;
use App\Http\Controllers\UserController;
use FontLib\Table\Type\name;
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

Route::get('/metricas', [metricascontroller::class, 'index'])->name('metricas.index'); // ruta que remplaza a dashboard ahora se llama metricas

//rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cargos', [CargoController::class, 'index'])->name('administrador.cargos.listar');

    Route::prefix('/personal')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('usuario.index'); // Listar usuarios
        Route::post('/create', [UserController::class, 'store'])->name('usuario.store'); // Crear nuevo usuario
        Route::get('/{id}', [UserController::class, 'show'])->name('usuario.show'); // Mostrar usuario específico
        Route::put('/update/{id}', [UserController::class, 'update'])->name('usuario.update'); // Actualizar usuario
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('usuario.destroy'); // Eliminar usuario
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('usuario.edit'); // Eliminar usuario
    });

    //rutas para tipo documento
    Route::prefix('/tipoDoc')->group(function () {
        Route::get('/', [tipoDocumentoController::class, 'index'])->name('tipoDoc.index');
        Route::post('/create', [tipoDocumentoController::class, 'store'])->name('tipoDoc.store');
        Route::put('/editar/{id}', [tipoDocumentoController::class, 'update'])->name('tipoDoc.update');
        Route::post('/cambioDeEstado/{id}', [tipoDocumentoController::class, 'cambioEstado'])->name('tipoDoc.cambioEstado');
    });

    //rutas para documento
    Route::prefix('/documentos')->group(function () {
        Route::get('/', [documentosController::class, 'index'])->name('documentos.index');
        Route::post('/create', [documentosController::class, 'store'])->name('documentos.store');
        Route::put('/update/{id}', [documentosController::class, 'update'])->name('documentos.update');
        Route::post('/cambioEstado/{id}', [documentosController::class, 'cambioEstado'])->name('documentos.cambioEstado');
    });

    Route::post('/reporte/pdf', [ReporteController::class, 'generarPDF'])->name('reporte.pdf');
    Route::post('/reporte/excel', [ReporteController::class, 'generarExcel'])->name('reporte.excel');

    //rutas prestamos
    Route::prefix('/prestamos')->group(function () {
        Route::get('/', [prestamosController::class, 'index'])->name('prestamos.index');
        Route::get('/buscar-documento', [PrestamosController::class, 'buscar'])->name('prestamos.buscar');
        Route::get('/buscar-funcionario', [PrestamosController::class, 'buscarfuncionario'])->name('prestamos.buscarFuncionario');
        Route::post('/create', [prestamosController::class, 'store'])->name('prestamos.store');
        Route::post('/cambioEstado/{id}', [prestamosController::class, 'cambioEstado'])->name('prestamos.cambioEstado');
    });
    Route::put('/prestamos/{id}', [prestamosController::class, 'update'])->name('prestamos.update');
    Route::post('/prestamos/edit/{id}', [prestamosController::class, 'actualizar'])->name('prestamos.actualizar');
    Route::get('/prestamos/show/{id}', [prestamosController::class, 'show'])->name('prestamos.show');
    Route::post('/prestamos/reportes/', [ReporteController::class, 'generarReporte'])->name('prestamos.reporte');

    //rutas impresiones
    Route::prefix('/impresiones')->group(function () {
        Route::get('/', [impresionesController::class, 'index'])->name('impresiones.index');
        Route::post('/create', [impresionesController::class, 'store'])->name('impresiones.store');
        Route::get('/buscar-documento', [impresionesController::class, 'buscarDocumento'])->name('impresiones.bDoc');
        Route::get('/buscar-funcionario', [impresionesController::class, 'buscarFuncionario'])->name('impresiones.bFun');
        Route::post('/cambioEstado/{id}', [impresionesController::class, 'cambioEstado'])->name('impresiones.cambioEstado');
        Route::get('/documentos/{id}', [impresionesController::class, 'imprimir'])->name('documentos.imprimir');
        Route::post('/reporte', [ReporteController::class, 'ReporteImpresiones'])->name('impresiones.reporte');
    });
});
require __DIR__ . '/auth.php';
