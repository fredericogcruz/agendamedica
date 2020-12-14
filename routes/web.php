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
Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('/usuarios', 'App\Http\Controllers\UsuariosController');
Route::resource('/pacientes', 'App\Http\Controllers\PacientesController');
Route::resource('/medicos', 'App\Http\Controllers\MedicosController');
Route::resource('/agendamentos', 'App\Http\Controllers\AgendamentosController');



Route::get("/getUsuarios", "App\Http\Controllers\UsuariosController@ajaxConsultarUsuarios")->name("ajax.usuarios.consultar");
Route::get("/getPacientes", "App\Http\Controllers\PacientesController@ajaxConsultarPacientes")->name("ajax.pacientes.consultar");
Route::get("/getMedicos", "App\Http\Controllers\MedicosController@ajaxConsultarMedicos")->name("ajax.medicos.consultar");
Route::get("/getAgendamentos", "App\Http\Controllers\AgendamentosController@ajaxConsultarAgendamentos")->name("ajax.agendamentos.consultar");

Route::get("/getMedicoAutoComplete", "App\Http\Controllers\AgendamentosController@ajaxConsultarMedicoAutoComplete")->name("ajax.medicoautocomplete.consultar");








