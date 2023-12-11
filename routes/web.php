<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;

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

//Route::get('/', function () { return view('index');})->middleware('auth');;


Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index')->middleware('auth');
Route::get('/asistencias/reportes', [AsistenciaController::class, 'reportes'])->name('reportes')->middleware('auth');
Route::get('/asistencias/pdf', [AsistenciaController::class, 'pdf'])->name('pdf')->middleware('auth');
Route::get('/asistencias/pdf_fechas', [AsistenciaController::class, 'pdf_fechas'])->name('pdf_fechas')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Auth::routes(['register'=>true]);


Route::resource('/miembros',\App\Http\Controllers\MiembroController::class)->middleware('can:miembros');
Route::resource('/ministerios',\App\Http\Controllers\MinisterioController::class)->middleware('can:ministerios');
Route::resource('/usuarios',\App\Http\Controllers\UserController::class)->middleware('can:usuarios');
Route::resource('/asistencias',\App\Http\Controllers\AsistenciaController::class)->middleware('auth');


//Route::get('/miembros', function () {
  //  return view('miembros.index');
//})->middleware('auth');;
