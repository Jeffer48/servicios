<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\radio_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\etapas_controller;
use App\Http\Controllers\datos_controller;
use App\Http\Controllers\catalogos_controller;

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
    return redirect('radio');
});

Route::controller(login_controller::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login/data', 'getData')->name('getData');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {return view('dashboard');})->name('dashboard');

    Route::controller(radio_controller::class)->group(function () {
        Route::get('/radio', 'index')->name('reporte');
        Route::post('/radio/registrar', 'registrar')->name('registrar');
    });

    Route::controller(etapas_controller::class)->group(function () {
        Route::get('/etapas', 'index')->name('etapas');
        Route::post('/etapas/registrar', 'guardar')->name('guardarEtapas');
        Route::get('/sinTerminar', 'sinTerminar')->name('sinTerminar');
    });

    Route::controller(catalogos_controller::class)->group(function () {
        Route::get('/catalogos', 'index')->name('catalogos');
        Route::post('/catalogos/editar', 'editar')->name('editar');
        Route::post('/catalogos/eliminar', 'eliminar')->name('eliminar');
        Route::post('/catalogos/activar', 'activar')->name('activar');
        Route::post('/catalogos/guardar', 'guardar')->name('guardar');
    });

    Route::get('/datos', [datos_controller::class, 'index']);

    Route::controller(login_controller::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});
