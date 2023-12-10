<?php

use App\Http\Controllers\Api\TareaController;
use App\Http\Controllers\Api\PrioridadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {

    // Rutas tareas
    // Route::apiResource('tareas', TareaController::class);
    Route::get('/tareas', [TareaController::class, 'index']);
    Route::get('/tareas/{id}', [TareaController::class, 'show']);
    Route::post('/tareas', [TareaController::class, 'store']);
    Route::put('/tareas/{id}', [TareaController::class, 'update']);
    Route::delete('/tareas/{id}', [TareaController::class, 'destroy']);

    // Rutas Prioridad
    Route::get('/prioridades', [PrioridadController::class, 'index']);
    Route::get('/prioridades/{id}', [PrioridadController::class, 'show']);
    Route::post('/prioridades', [PrioridadController::class, 'store']);
});
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
    