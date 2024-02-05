<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Producto;

class ProductoController extends Controller {
    public function index() {
        $productos = Producto::with(['categoria', 'formatosProducto'])->get();
        return response()->json($productos);
    }
}
