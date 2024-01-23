<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CintaController;
use App\Http\Controllers\Api\RotuloController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\MovimientoController;
use App\Http\Controllers\Api\ResponsableController;
use App\Http\Controllers\Api\EstadoRotuloController;
use App\Http\Controllers\Api\EstadoSnRotuloController;
use App\Http\Controllers\Api\UserMovimientosController;
use App\Http\Controllers\Api\CintaMovimientosController;
use App\Http\Controllers\Api\EstadoMovimientoController;
use App\Http\Controllers\Api\EmpresaResponsablesController;
use App\Http\Controllers\Api\EstadoRotuloRotulosController;
use App\Http\Controllers\Api\IngresoCintaSnRotuloController;
use App\Http\Controllers\Api\ResponsableMovimientosController;
use App\Http\Controllers\Api\IngresoCintaSnRotuloCintasController;
use App\Http\Controllers\Api\EstadoMovimientoMovimientosController;
use App\Http\Controllers\Api\RotuloIngresoCintaSnRotulosController;
use App\Http\Controllers\Api\EstadoSnRotuloIngresoCintaSnRotulosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('cintas', CintaController::class);

        // Cinta Movimientos
        Route::get('/cintas/{cinta}/movimientos', [
            CintaMovimientosController::class,
            'index',
        ])->name('cintas.movimientos.index');
        Route::post('/cintas/{cinta}/movimientos', [
            CintaMovimientosController::class,
            'store',
        ])->name('cintas.movimientos.store');

        Route::apiResource('empresas', EmpresaController::class);

        // Empresa Responsables
        Route::get('/empresas/{empresa}/responsables', [
            EmpresaResponsablesController::class,
            'index',
        ])->name('empresas.responsables.index');
        Route::post('/empresas/{empresa}/responsables', [
            EmpresaResponsablesController::class,
            'store',
        ])->name('empresas.responsables.store');

        Route::apiResource(
            'estado-movimientos',
            EstadoMovimientoController::class
        );

        // EstadoMovimiento Movimientos
        Route::get('/estado-movimientos/{estadoMovimiento}/movimientos', [
            EstadoMovimientoMovimientosController::class,
            'index',
        ])->name('estado-movimientos.movimientos.index');
        Route::post('/estado-movimientos/{estadoMovimiento}/movimientos', [
            EstadoMovimientoMovimientosController::class,
            'store',
        ])->name('estado-movimientos.movimientos.store');

        Route::apiResource('estado-rotulos', EstadoRotuloController::class);

        // EstadoRotulo Rotulos
        Route::get('/estado-rotulos/{estadoRotulo}/rotulos', [
            EstadoRotuloRotulosController::class,
            'index',
        ])->name('estado-rotulos.rotulos.index');
        Route::post('/estado-rotulos/{estadoRotulo}/rotulos', [
            EstadoRotuloRotulosController::class,
            'store',
        ])->name('estado-rotulos.rotulos.store');

        Route::apiResource(
            'estado-sn-rotulos',
            EstadoSnRotuloController::class
        );

        // EstadoSnRotulo Ingreso Cinta Sn Rotulos
        Route::get(
            '/estado-sn-rotulos/{estadoSnRotulo}/ingreso-cinta-sn-rotulos',
            [EstadoSnRotuloIngresoCintaSnRotulosController::class, 'index']
        )->name('estado-sn-rotulos.ingreso-cinta-sn-rotulos.index');
        Route::post(
            '/estado-sn-rotulos/{estadoSnRotulo}/ingreso-cinta-sn-rotulos',
            [EstadoSnRotuloIngresoCintaSnRotulosController::class, 'store']
        )->name('estado-sn-rotulos.ingreso-cinta-sn-rotulos.store');

        Route::apiResource(
            'ingreso-cinta-sn-rotulos',
            IngresoCintaSnRotuloController::class
        );

        // IngresoCintaSnRotulo Cintas
        Route::get('/ingreso-cinta-sn-rotulos/{ingresoCintaSnRotulo}/cintas', [
            IngresoCintaSnRotuloCintasController::class,
            'index',
        ])->name('ingreso-cinta-sn-rotulos.cintas.index');
        Route::post('/ingreso-cinta-sn-rotulos/{ingresoCintaSnRotulo}/cintas', [
            IngresoCintaSnRotuloCintasController::class,
            'store',
        ])->name('ingreso-cinta-sn-rotulos.cintas.store');

        Route::apiResource('movimientos', MovimientoController::class);

        Route::apiResource('responsables', ResponsableController::class);

        // Responsable Movimientos
        Route::get('/responsables/{responsable}/movimientos', [
            ResponsableMovimientosController::class,
            'index',
        ])->name('responsables.movimientos.index');
        Route::post('/responsables/{responsable}/movimientos', [
            ResponsableMovimientosController::class,
            'store',
        ])->name('responsables.movimientos.store');

        Route::apiResource('rotulos', RotuloController::class);

        // Rotulo Ingreso Cinta Sn Rotulos
        Route::get('/rotulos/{rotulo}/ingreso-cinta-sn-rotulos', [
            RotuloIngresoCintaSnRotulosController::class,
            'index',
        ])->name('rotulos.ingreso-cinta-sn-rotulos.index');
        Route::post('/rotulos/{rotulo}/ingreso-cinta-sn-rotulos', [
            RotuloIngresoCintaSnRotulosController::class,
            'store',
        ])->name('rotulos.ingreso-cinta-sn-rotulos.store');

        Route::apiResource('users', UserController::class);

        // User Movimientos
        Route::get('/users/{user}/movimientos', [
            UserMovimientosController::class,
            'index',
        ])->name('users.movimientos.index');
        Route::post('/users/{user}/movimientos', [
            UserMovimientosController::class,
            'store',
        ])->name('users.movimientos.store');
    });
