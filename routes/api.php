<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use League\Flysystem\Plugin\GetWithMetadata;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::resource('cliente',ClienteController::class);

Route::get('clientes',[ClienteController::class,'index']);

Route::post('clientes/crear',[ClienteController::class,'store']);

Route::put('clientes/actualiza/{id}',[ClienteController::class,'update']);


Route::delete('clientes/eliminar/{id}',[ClienteController::class,'destroy']);


Route::get('login',[ClienteController::class,'login']);
