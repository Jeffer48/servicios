<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\radio_controller;

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

Route::get('/login', function () {
    return view('login');
});

Route::controller(radio_controller::class)->group(function () {
    Route::get('/radio', 'index')->name('reporte');
    Route::post('/radio/registrar', 'registrar')->name('registrar');
    Route::get('/etapa_uno', 'etapa_uno')->name('etapa_uno');
});