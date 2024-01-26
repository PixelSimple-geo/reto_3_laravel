<?php

use App\Http\Controllers\ProfileController;
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

//Controllers
use App\Http\Controllers\TableroController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;


//Inicio
Route::get('/', function () {
    return view('auth.login');
})->name('index');

//Autenticacion
Route::get('/dashboard', [TableroController::class, 'showTablero'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Productos
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.productoIndex');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.productoCreate');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.productoEdit');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');

    
    //Pedidos
    Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.pedidoCreate');
    Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('/pedidos/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::put('/pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');
    Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');

    //Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.clienteIndex');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.clienteCreate');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

});

require __DIR__.'/auth.php';
