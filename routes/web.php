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
Route::post('/home/estadistica','HomeController@estadistica');
Route::get('/home/estadisticaAvanzada','HomeController@estadisticaAvanzada');
Route::post('/generarGrafica','HomeController@generarGrafica')->name('generarGrafica');

Route::resource('users', 'UserController');
Route::resource('empleados', 'EmpleadoController');
Route::resource('solicitudes','SolicitudController');

Route::post('/empleados/adscripciones','EmpleadoController@adscripciones');
Route::post('/empleados/areas','EmpleadoController@areas');
Route::post('/empleados/darEmpleado','EmpleadoController@darEmpleado');
Route::post('/empleados/buscarEmpleados','EmpleadoController@buscarEmpleados');
Route::get('/agregarEmpleado','EmpleadoController@agregarEmpleado')->name('empleados.agregar');

Route::post('/solicitudes/asignar','SolicitudController@asignarSoporte');
Route::post('/solicitudes/guardarEquipo','SolicitudController@guardarEquipo');
Route::post('/solicitudes/guardarObservacion','SolicitudController@guardarObservacion');
Route::post('/solicitudes/guardarDiagnostico','SolicitudController@guardarDiagnostico');
Route::post('/solicitudes/terminar','SolicitudController@terminarSolicitud');
Route::post('/solicitudes/posponer','SolicitudController@posponerSolicitud');
Route::post('/solicitudes/generar','SolicitudController@generarPDF');
Route::post('/solicitudes/gestion','SolicitudController@gestionSolicitudes');
Route::get('/solicitudes/recibo/{folio}','SolicitudController@generarRecibo')->name('solicitudes.recibo');
Route::get('/agregarSolicitud/{idEmpleado}','SolicitudController@agregarSolicitud')->name('solicitudes.agregar');

Route::resource('equipos', 'EquipoController');
Route::post('/equipos/buscarEquipo','EquipoController@buscarEquipo');
Route::get('/equipos/agregarEquipo/{idSolicitud}','EquipoController@agregarEquipo')->name('equipos.agregarEquipo');

Route::resource('solicitudesSoporte','soporteSolicitudController');
Route::post('/solicitudesSoporte/asignar','soporteSolicitudController@asignarSoporte');
Route::post('/usuarioEstatus/Estado','UserController@updateEstado');
Route::post('/usuarioEstatus/Estadoinactivo','UserController@updateEstadoInactivo');
