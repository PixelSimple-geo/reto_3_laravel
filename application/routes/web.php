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
use App\Http\Controllers\PedidosController;

// Redireccionar a la página de inicio de sesión si el usuario no ha iniciado sesión
Route::middleware('auth')->group(function () {
    //Inicio
    Route::get('/', function () {
        return view('dashboard');
    })->name('index');
    

    //Dashboard
    Route::get('/{role}', [ProfileController::class, 'dashboard'])->name('dashboard');

    //Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Productos
    Route::get('/productoCreate', function () {
        return view('producto/productoCreate');
    });

    //Pedidos
    Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
});

require __DIR__.'/auth.php';
