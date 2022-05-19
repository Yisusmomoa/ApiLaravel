<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PuntuacionController;
use App\Http\Controllers\Api\ObjetoController;
use App\Http\Controllers\Api\InventarioController;


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


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']],function(){
    //rutas
    Route::get('user-profile',[UserController::class,'userProfile']);
    Route::get('logout', [UserController::class,'logOut']);
});

Route::get('Puntuaciones/{id}', [PuntuacionController::class,
    'showPuntuacionesFromUserId']);
Route::get('Puntuaciones', [PuntuacionController::class,'index']);
Route::post('Puntuaciones', [PuntuacionController::class,'store']);

Route::post('Objetos',[ObjetoController::class,'store']);


Route::post('Inventario',[InventarioController::class,'store']);
Route::get('Inventario',[InventarioController::class,'index']);
Route::get('Inventario/{id}',[InventarioController::class,'show']);

