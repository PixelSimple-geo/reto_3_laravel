<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Producto;

class ProductoController extends Controller {
    public function index($categoriaId = null) {
        if ($categoriaId) {
            $productos = Producto::with(['categoria', 'formatosProducto'])
                ->where('idCategoria', $categoriaId) // Adjust the column name as per your database structure
                ->get();
        } else {
            $productos = Producto::with(['categoria', 'formatosProducto'])
                ->get();
        }
        return response()->json($productos);
    }
}
