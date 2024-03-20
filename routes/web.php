<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\radio_controller;
use App\Http\Controllers\login_controller;

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
    Route::controller(radio_controller::class)->group(function () {
        Route::get('/radio', 'index')->name('reporte');
        Route::post('/radio/registrar', 'registrar')->name('registrar');
        Route::get('/etapa_uno', 'etapa_uno')->name('etapa_uno');
    });
});
