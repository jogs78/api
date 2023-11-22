<?php

use App\Http\Controllers\ChoferController;
use App\Http\Controllers\PuertaController;
use App\Http\Controllers\RutaApiController;
use App\Http\Controllers\UnidadController;
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
])->middleware('conToken:Concesionario');

Route::apiResource('unidades',UnidadController::class)->middleware('conToken:Chofer');

Route::get('choferes',[ChoferController::class,"index"])->middleware('conToken');
Route::get('choferes/{chofere}',[ChoferController::class,"show"])->middleware('conToken:Concesionario|Chofer');

Route::get('rutas/{ruta}/unidades/',[RutaApiController::class, 'unidades'])->name('apiRutas.unidades');
Route::post('validar',[PuertaController::class,'validar']);
