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
use App\Http\Controllers\UsetsController;
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

    //Formatos
    Route::get('/formatoProductos', [FormatoProductoController::class, 'index'])->name('formatos.formatoProductoIndex');
    Route::post('/formatoProductos', [FormatoProductoController::class, 'store'])->name('formatos.formatoProductoStore');
    Route::get('/formatoProductos/{formatoProducto}/edit', [FormatoProductoController::class, 'edit'])->name('formatos.formatoProductoEdit');
    Route::delete('/formatoProductos/{formatoProducto}', [FormatoProductoController::class, 'destroy'])->name('formatoProductos.destroy');
    Route::put('/formatoProductos/{formatoProducto}', [FormatoProductoController::class, 'update'])->name('formatoProductos.update');
    Route::get('/formato/create', [FormatoProductoController::class, 'create'])->name('formatos.formatoProductoCreate');

    //Tickets
    Route::get('/tickets', [TicketProductoController::class, 'index'])->name('tickets.ticketIndex');
    Route::get('/tickets/create', [TicketProductoController::class, 'create'])->name('tickets.ticketCreate');
    Route::post('/tickets', [TicketProductoController::class, 'store'])->name('tickets.ticketStore');
    Route::get('/tickets/{idPedido}/{idFormatoProducto}/edit', [TicketProductoController::class, 'edit'])->name('tickets.ticketEdit');
    Route::put('/tickets/{idPedido}/{idFormatoProducto}', [TicketProductoController::class, 'update'])->name('tickets.ticketUpdate');
    Route::delete('/tickets/{idPedido}/{idFormatoProducto}', [TicketProductoController::class, 'destroy'])->name('tickets.ticketDestroy');

    // Rutas para Categorías
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.categoriaIndex');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.categoriaEdit');
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

    // Rutas para Usuarios
    Route::get('/usuarios', [UsersController::class, 'index'])->name('usuarios.usuarioIndex');
    Route::get('/usuarios/create', [UsersController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsersController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}/edit', [UsersController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsersController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsersController::class, 'destroy'])->name('usuarios.destroy');

    //Estadisticas
    Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas');

});

// Vue.js API
Route::get("/api/pedidos", [api\PedidoController::class, 'index']);
Route::post("/api/pedidos/store", [api\PedidoController::class, 'store']);
Route::delete("/api/pedidos/{id}", [api\PedidoController::class, "destroy"]);

Route::get("/api/productos", [api\ProductoController::class, 'index']);
Route::post("/api/sesion", [api\SesionClienteController::class, 'store']);

require __DIR__.'/auth.php';