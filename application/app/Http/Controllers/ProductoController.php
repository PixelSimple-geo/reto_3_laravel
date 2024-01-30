<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $productos = Producto::query()
            ->where(function ($query) use ($search) {
                $query->where('nombreProducto', 'LIKE', "%$search%");
            })
            ->paginate(5); 

            $productos->appends(['search' => $search]);

        return view('productos.productoIndex', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.productoCreate', compact('categorias'));
    }

    public function store(Request $request)
    {
        $producto = Producto::create($request->all());
        return Redirect::route('productos.productoIndex')->with('success', 'Producto creado exitosamente.');
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

        return Redirect::route('productos.productoIndex')->with('success', 'Producto modificado exitosamente.');

    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return Redirect::route('productos.productoIndex')->with('success', 'Producto eliminado exitosamente.');
    }
}
