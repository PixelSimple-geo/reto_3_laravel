<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\PedidoController;
use App\Http\Controllers\api\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Vue.js API
Route::get("/pedidos/{idCliente}", [PedidoController::class, 'index']);
Route::post("/pedidos/store", [PedidoController::class, 'store']);
Route::delete("/pedidos/{id}", [PedidoController::class, "destroy"]);

Route::get("/productos", [ProductoController::class, 'index']);
Route::post("/sesion", [AuthController::class, 'login']);

