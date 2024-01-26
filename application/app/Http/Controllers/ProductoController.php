<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;


class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view("productos.productoIndex", compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.productoCreate', compact('categorias'));
    }

    public function store(Request $request)
    {
        $producto = Producto::create($request->all());
        return redirect()->route('productos.productoIndex')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        return response()->json($producto, 200);
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.productoEdit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());

        return redirect()->route('productos.productoIndex')
                            ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.productoIndex')->with('success', 'Producto eliminado exitosamente.');
    }
}
