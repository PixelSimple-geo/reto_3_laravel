<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Producto;

class ProductoController extends Controller {
    public function index($categoriaId = null) {
        if ($categoriaId) {
            // Retrieve products with the specified category ID and related data
            $productos = Producto::with(['categoria', 'formatosProducto'])
                ->where('idCategoria', $categoriaId) // Adjust the column name as per your database structure
                ->get();
        } else {
            // If no category ID is provided, retrieve all products
            $productos = Producto::with(['categoria', 'formatosProducto'])
                ->get();
        }
        return response()->json($productos);
    }
}
