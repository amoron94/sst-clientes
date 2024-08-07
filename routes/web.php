<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CondominioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\UnidadController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('custom.auth');


Route::get('/', [LoginController::class, 'logeo'])->name('login_page');

Route::post('/ingresar', [LoginController::class, 'acceder'])->name('acceder');

Route::get('cerrar-sesion', [LoginController::class, 'logout']);




Route::get('u_medida', [UnidadController::class, 'index'])->middleware('custom.auth');
Route::post('/guardar-medida', [UnidadController::class, 'store'])->name('guardar_medida');
Route::patch('/editar-medida/{id}', [UnidadController::class, 'update'])->name('editar_medida');
Route::delete('/eliminar-medida/{id}', [UnidadController::class, 'destroy'])->name('eliminar_medida');


Route::get('categoria', [CategoriaController::class, 'index'])->middleware('custom.auth');


Route::get('sucursal', [SucursalController::class, 'index'])->middleware('custom.auth');
