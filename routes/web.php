<?php

use App\Http\Controllers\Bit_maestropdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BitUsuarioController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BitTipos;
use App\Http\Controllers\Bit_select;
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
    return view('auth.login');
});

Auth::routes();

// CONTROLADOR DE  REDIRECCIONAMIENTO AL HOME PRINCIPAL LACALDERON 20/02/2023
Route::get('/home', [Bit_select::class,'listar_desplegables'])->name('home');


// Controlador generado para el registro del nro de registro del nuevo maestro_turno lacalderon 13/02/2023
Route::get('/listado_usuarios', [BitUsuarioController::class, 'usuarios']);
Route::get('/bit_usuario', [BitUsuarioController::class, 'logueo']);
Route::post('/bit_usuario_1', [BitUsuarioController::class, 'registro_usuario']);
Route::get('/usuario_especifico/{id}', [BitUsuarioController::class,'usuario_especifico']);
Route::post('/editar_usuario', [BitUsuarioController::class,'editar_usuario']);
Route::get('/inactivar_usuario/{id}', [BitUsuarioController::class,'inactivar_usuario']);
Route::get('/activar_usuario/{id}', [BitUsuarioController::class,'activar_usuario']);
Route::get('/usuario_especifico_2/{id}', [BitUsuarioController::class,'usuario_especifico_2']);
Route::post('/restablecer_contrasena', [BitUsuarioController::class,'restablecer_contrasena']);

// Controlador generado para el redireccionamiento a cada uno de los módulos lacalderon 13/02/2023
Route::get('/turnoactivo', [MenuController::class,'turnoactivo'])->name('turnoactivo');
Route::get('/historial', [MenuController::class,'historial'])->name('historial');
Route::get('/historial_ceges', [MenuController::class,'historial_ceges'])->name('historial_ceges');
Route::get('/zonas', [MenuController::class,'zonas'])->name('zonas');
Route::get('/agentes', [MenuController::class,'agentes'])->name('agentes');
Route::get('/inactivar_agente/{id}', [BitUsuarioController::class,'inactivar_agente']);
Route::get('/activar_agente/{id}', [BitUsuarioController::class,'activar_agente']);
Route::get('/agente_especifico/{id}', [BitUsuarioController::class,'agente_especifico']);
Route::post('/editar_agente', [BitUsuarioController::class,'editar_agente']);
Route::post('/historial_ceges_detalle', [Bit_maestropdfController::class,'consulta_ceges'])->name('consulta_ceges');

Route::get('/reportes', [Bit_maestropdfController::class,'reportes'])->name('reportes');
Route::post('/pdf',[Bit_maestropdfController::class,'crearPDF'])->name('crearPDF');

Route::get('/maestroTurno', [MenuController::class,'maestroTurno']);
Route::post('/inicio_turno', [Bit_maestropdfController::class,'inicio_turno'])->name('inicio_turno');
Route::get('/maestroTurno', [Bit_maestropdfController::class,'consulta_turno_activo'])->name('consulta_turno_activo');

// Controlador generado para la validación de turnos activos en maestro turnos lacalderon 21/02/2023
Route::post('/validacion_turno', [Bit_maestropdfController::class,'validacion_turno'])->name('validacion_turno');

// Controlador generado para el redireccionamiento de los tipos seleccionables lacalderon 17/02/2023
Route::get('/tipo_accidente', [BitTipos::class,'consulta_tipo_accidente']);
Route::get('/tipo_control', [BitTipos::class,'consulta_tipo_control']);
Route::get('/tipo_procedimiento', [BitTipos::class,'consulta_tipo_procedimiento']);
Route::get('/tipo_prueba', [BitTipos::class,'consulta_tipo_prueba']);
Route::get('/tipo_servicio', [BitTipos::class,'consulta_tipo_servicio']);
Route::get('/zonas', [BitTipos::class,'consulta_zona']);
Route::get('/agentes', [BitUsuarioController::class,'consulta_agentes']);

// Controlador generado para el registro de los tipos seleccionables lacalderon 17/02/2023
Route::post('/registro_tipo_acc', [BitTipos::class,'registro_tipo_acc']);
Route::post('/registro_tipo_cont', [BitTipos::class,'registro_tipo_cont']);
Route::post('/registro_tipo_proc', [BitTipos::class,'registro_tipo_proc']);
Route::post('/registro_tipo_prueba', [BitTipos::class,'registro_tipo_prueba']);
Route::post('/registro_tipo_cont', [BitTipos::class,'registro_tipo_cont']);
Route::post('/registro_tipo_cont', [BitTipos::class,'registro_tipo_cont']);
Route::post('/registro_zona', [BitTipos::class,'registro_zona']);
Route::post('/registro_agente', [BitUsuarioController::class,'registro_agente']);

// Controlador generado para LA ELIMINACIÓN de los tipos seleccionables lacalderon 17/02/2023
Route::get('/eliminar_tipo_accidente/{id}', [BitTipos::class,'eliminar_tipo_accidente']);
Route::get('/eliminar_tipo_control/{id}', [BitTipos::class,'eliminar_tipo_control']);
Route::get('/eliminar_tipo_prueba/{id}', [BitTipos::class,'eliminar_tipo_prueba']);
Route::get('/eliminar_tipo_servicio/{id}', [BitTipos::class,'eliminar_tipo_servicio']);
Route::get('/eliminar_tipo_proc/{id}', [BitTipos::class,'eliminar_tipo_proc']);
Route::get('/eliminar_zona/{id}', [BitTipos::class,'eliminar_zona']);

// CONTROLADORES CREADOS PARA LA INTERACCIÓN CON EL TURNO INICIADO LACALDERON 20/02/2023
Route::get('/pausar_turno/{id}', [Bit_maestropdfController::class,'pausar_turno']);
Route::get('/reanudar_turno/{id}', [Bit_maestropdfController::class,'reanudar_turno']);
Route::get('/finalizar_turno/{id}', [Bit_maestropdfController::class,'finalizar_turno']);

// CONTROLADORES CREADOS PARA LA INSERCIÓN Y CONSULTA DE TIPO PRUEBA ALCOHOLEMIA LACALDERON 20/02/2023
Route::get('/registrar_1', [MenuController::class,'registrar_1'])->name('registrar_1');
Route::get('/turnoactivo', [MenuController::class,'all']);

// CONTROLADORES CREADOS PARA LA INSERCIÓN Y CONSULTA DE INCIDENCIAS LACALDERON 20/02/2023
Route::get('/registrar_incidencia', [MenuController::class,'registrar_incidencia'])->name('registrar_incidencia');
Route::get('/registrar_accidente', [MenuController::class,'registrar_accidente'])->name('registrar_accidente');
Route::get('/registrar_proc', [MenuController::class,'registrar_proc'])->name('registrar_proc');