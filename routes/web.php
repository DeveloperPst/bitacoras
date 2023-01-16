<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/primerTurno', [App\Http\Controllers\HomeController::class,'turno1'])->name('primerTurno');
 
Route::get('/segundoTurno', [App\Http\Controllers\HomeController::class,'turno2'])->name('segundoTurno');

Route::get('/tercerTurno', [App\Http\Controllers\HomeController::class,'turno3'])->name('tercerTurno');

Route::get('/reportes', [App\Http\Controllers\HomeController::class,'reportes'])->name('reportes');

Route::get('/graficas', [App\Http\Controllers\HomeController::class,'graficas'])->name('graficas');

Route::get('/perfiles', [App\Http\Controllers\HomeController::class,'perfiles'])->name('perfiles');

Route::get('/cambiarContrasena', [App\Http\Controllers\HomeController::class,'cambiarContrasena'])->name('cambiarContrasena');


