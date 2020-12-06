<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('empleados', 'EmpleadoController');
Route::resource('solicitudes','SolicitudController');

Route::post('/empleados/adscripciones','EmpleadoController@adscripciones');
Route::post('/empleados/areas','EmpleadoController@areas');
Route::post('/empleados/darEmpleado','EmpleadoController@darEmpleado');

Route::post('/solicitudes/asignar','SolicitudController@asignarSoporte');
Route::post('/solicitudes/guardarEquipo','SolicitudController@guardarEquipo');
Route::post('/solicitudes/guardarObservacion','SolicitudController@guardarObservacion');
Route::post('/solicitudes/guardarDiagnostico','SolicitudController@guardarDiagnostico');
Route::post('/solicitudes/terminar','SolicitudController@terminarSolicitud');
Route::post('/solicitudes/posponer','SolicitudController@posponerSolicitud');

Route::resource('equipos', 'EquipoController');
Route::post('/equipos/buscarEquipo','EquipoController@buscarEquipo');
