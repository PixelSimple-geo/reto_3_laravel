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
use App\Http\Controllers\api;
use App\Http\Controllers\FormatoProductoController;
use App\Http\Controllers\TicketProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EstadisticasController;

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
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.productoIndex')->middleware('role:responsable,administrativo');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.productoCreate')->middleware('role:responsable,administrativo');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store')->middleware('role:responsable,administrativo');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.productoEdit')->middleware('role:responsable,administrativo');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy')->middleware('role:responsable,administrativo');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update')->middleware('role:responsable,administrativo');

    //Pedidos
    Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.pedidoCreate');
    Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('/pedidos/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::put('/pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');
    Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');

    //Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.clienteIndex')->middleware('role:responsable,administrativo');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit')->middleware('role:responsable,administrativo');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy')->middleware('role:responsable,administrativo');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update')->middleware('role:responsable,administrativo');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.clienteCreate')->middleware('role:responsable,administrativo');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store')->middleware('role:responsable,administrativo');

    //Formatos
    Route::get('/formatoProductos', [FormatoProductoController::class, 'index'])->name('formatos.formatoProductoIndex')->middleware('role:responsable,administrativo');
    Route::post('/formatoProductos', [FormatoProductoController::class, 'store'])->name('formatos.formatoProductoStore')->middleware('role:responsable,administrativo');
    Route::get('/formatoProductos/{formatoProducto}/edit', [FormatoProductoController::class, 'edit'])->name('formatos.formatoProductoEdit')->middleware('role:responsable,administrativo');
    Route::delete('/formatoProductos/{formatoProducto}', [FormatoProductoController::class, 'destroy'])->name('formatoProductos.destroy')->middleware('role:responsable,administrativo');
    Route::put('/formatoProductos/{formatoProducto}', [FormatoProductoController::class, 'update'])->name('formatoProductos.update')->middleware('role:responsable,administrativo');
    Route::get('/formato/create', [FormatoProductoController::class, 'create'])->name('formatos.formatoProductoCreate')->middleware('role:responsable,administrativo');

    //Tickets
    Route::get('/tickets', [TicketProductoController::class, 'index'])->name('tickets.ticketIndex');
    Route::get('/tickets/create', [TicketProductoController::class, 'create'])->name('tickets.ticketCreate');
    Route::post('/tickets', [TicketProductoController::class, 'store'])->name('tickets.ticketStore');
    Route::get('/tickets/{idPedido}/{idFormatoProducto}/edit', [TicketProductoController::class, 'edit'])->name('tickets.ticketEdit');
    Route::put('/tickets/{idPedido}/{idFormatoProducto}', [TicketProductoController::class, 'update'])->name('tickets.ticketUpdate');
    Route::delete('/tickets/{idPedido}/{idFormatoProducto}', [TicketProductoController::class, 'destroy'])->name('tickets.ticketDestroy');

    // Rutas para Categorías
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.categoriaIndex')->middleware('role:responsable,administrativo');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create')->middleware('role:responsable,administrativo');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store')->middleware('role:responsable,administrativo');
    Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.categoriaEdit')->middleware('role:responsable,administrativo');
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update')->middleware('role:responsable,administrativo');
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy')->middleware('role:responsable,administrativo');

    // Rutas para Usuarios
    Route::get('/usuarios', [UsersController::class, 'index'])->name('usuarios.usuarioIndex')->middleware('role:responsable,administrativo');
    Route::get('/usuarios/{usuario}/edit', [UsersController::class, 'edit'])->name('usuarios.usuarioEdit')->middleware('role:responsable,administrativo');
    Route::put('/usuarios/{usuario}', [UsersController::class, 'update'])->name('usuarios.update')->middleware('role:responsable,administrativo');
    Route::delete('/usuarios/{usuario}', [UsersController::class, 'destroy'])->name('usuarios.destroy')->middleware('role:responsable,administrativo');


    //Estadisticas
    Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas')->middleware('role:responsable');

});

require __DIR__.'/auth.php';