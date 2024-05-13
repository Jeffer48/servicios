<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\radio_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\etapas_controller;
use App\Http\Controllers\datos_controller;
use App\Http\Controllers\catalogos_controller;
use App\Http\Controllers\reportes_controller;
use App\Http\Controllers\usuarios_controller;
use App\Http\Controllers\combustible_controller;

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
        Route::get('/catalogos', 'catalogo')->name('catalogos');
        Route::post('/catalogos/get-catalogo', 'getCatalogo')->name('get-catalogo');
        Route::post('/catalogos/editar', 'editar')->name('editar');
        Route::post('/catalogos/eliminar', 'eliminar')->name('eliminar');
        Route::post('/catalogos/activar', 'activar')->name('activar');
        Route::post('/catalogos/guardar', 'guardar')->name('guardar');
        Route::post('/catalogos/nuevoPersonal', 'guardarPersonal')->name('nuevoPersonal');
        Route::get('/grupos', 'grupos')->name('grupos');
        Route::post('/grupos/get-grupos', 'getGrupos')->name('get-grupos');
        Route::get('/personal', 'personal')->name('personal');
        Route::post('/get-personal', 'getPersonal')->name('get-personal');
    });

    Route::controller(usuarios_controller::class)->group(function () {
        Route::get('/usuarios', 'index')->name('usuarios');
        Route::post('/usuarios/getUsuarios', 'getUsuarios')->name('get-usuarios');
        Route::post('/usuarios/saveUser', 'saveUser')->name('save-user');
        Route::post('/usuarios/change', 'changeEstate')->name('changeEstate');
        Route::post('/usuarios/update', 'updateUser')->name('updateUser');
        Route::post('/usuarios/getUser', 'userToUpdate')->name('userToUpdate');
    });

    Route::controller(reportes_controller::class)->group(function () {
        Route::get('/reportes', 'index')->name('reportes');
        Route::post('/reportes/getReportes', 'getReportes')->name('get-reportes');
    });

    Route::controller(combustible_controller::class)->group(function () {
        Route::get('/cargar-combustible', 'index')->name('combustible');
        Route::post('/cargar-combustible/guardar', 'guardar')->name('guardarCarga');
    });

    Route::controller(datos_controller::class)->group(function () {
        Route::post('/datos/reportes', 'reportes')->name('reportes');
        Route::post('/datos/desplazamiento', 'desplazamiento')->name('desplazamiento');
        Route::post('/datos/desplazamiento/terminar', 'terminarDesplazamiento')->name('terminar');
    });

    Route::controller(login_controller::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});
