<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FinancialProductController;

Route::middleware('api')->group(function () {
    // Rutas para el modulo administrativo de demantantes
    Route::prefix('productos_financieros')->group(function () {
        Route::get('/departamentos', [FinancialProductController::class, 'departamentos']);
        Route::get('/municipios/{departamentoId}', [FinancialProductController::class, 'municipios']);
        Route::get('/tipos-persona', [FinancialProductController::class, 'tiposPersonas']);
        Route::get('/tipos-documento', [FinancialProductController::class, 'tiposDocumentos']);
        Route::get('/tipos-empresa', [FinancialProductController::class, 'tiposEmpresas']);
        Route::get('/tipos-movimiento/{tipoCuenta}', [FinancialProductController::class, 'tiposMovimiento']);
        Route::get('/franquicias', [FinancialProductController::class, 'franquicias']);
        Route::get('/roles', [FinancialProductController::class, 'roles']);
        Route::post('/crear-persona', [FinancialProductController::class, 'crearPersona']);
        Route::post('/crear-cuenta-ahorro', [FinancialProductController::class, 'crearCuentaAhorro']);
        Route::post('/movimiento-cuenta-ahorro', [FinancialProductController::class, 'crearMovimientoAhorros']);
        Route::post('/crear-tarjeta-credito', [FinancialProductController::class, 'crearTarjetaCredito']);
        Route::post('/movimiento-tarjeta-credito', [FinancialProductController::class, 'crearMovimientoTarjetaCredito']);
    });
});
