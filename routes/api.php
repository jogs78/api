<?php

use App\Http\Controllers\RutaApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('rutaz',RutaApiController::class);
Route::apiResource('rutas', RutaApiController::class)->names([
    'index' => 'apiRutas.index',
    'store' => 'apiRutas.store',
    'show' => 'apiRutas.show',
    'update' => 'apiRutas.update',
    'destroy' => 'apiRutas.destroy',
]);
Route::get('rutas/{ruta}/unidades/',[RutaApiController::class, 'unidades'])->name('apiRutas.unidades');