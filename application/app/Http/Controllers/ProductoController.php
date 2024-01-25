<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view("productos.productoIndex", compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idCategoria' => 'required|exists:categorias,id',
            'nombreProducto' => 'required|string',
            'descripcionProducto' => 'required|string',
            'fotoURL' => 'required|string'
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    public function show(Producto $producto)
    {
        return response()->json($producto, 200);
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'idCategoria' => 'required|exists:categorias,id',
            'nombreProducto' => 'required|string',
            'descripcionProducto' => 'required|string',
            'fotoURL' => 'required|string'
        ]);

        $producto->update($request->all());
        return response()->json($producto, 200);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(null, 204);
    }
}
    