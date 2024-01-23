<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CintaController;
use App\Http\Controllers\RotuloController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\EstadoRotuloController;
use App\Http\Controllers\EstadoSnRotuloController;
use App\Http\Controllers\EstadoMovimientoController;
use App\Http\Controllers\IngresoCintaSnRotuloController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('cintas', CintaController::class);
        Route::resource('empresas', EmpresaController::class);
        Route::resource(
            'estado-movimientos',
            EstadoMovimientoController::class
        );
        Route::resource('estado-rotulos', EstadoRotuloController::class);
        Route::resource('estado-sn-rotulos', EstadoSnRotuloController::class);
        Route::resource(
            'ingreso-cinta-sn-rotulos',
            IngresoCintaSnRotuloController::class
        );
        Route::resource('movimientos', MovimientoController::class);
        Route::resource('responsables', ResponsableController::class);
        Route::resource('rotulos', RotuloController::class);
        Route::resource('users', UserController::class);
    });
