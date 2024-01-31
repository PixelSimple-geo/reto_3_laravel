<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $productos = Producto::query()
            ->where(function ($query) use ($search) {
                $query->where('nombreProducto', 'LIKE', "%$search%")
                    ->orWhereHas('categoria', function ($query) use ($search) {
                        $query->where('nombreCategoria', 'LIKE', "%$search%");
                    });
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
        $validatedData = $request->validate([
            'idCategoria' => 'required',
            'nombreProducto' => 'required|string',
            'descripcionProducto' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagenPath = $request->file('imagen')->store('public/imagenes');
        $imagenPath = str_replace('public/', '', $imagenPath); 
        $producto = Producto::create([
            'idCategoria' => $validatedData['idCategoria'],
            'nombreProducto' => $validatedData['nombreProducto'],
            'descripcionProducto' => $validatedData['descripcionProducto'],
            'fotoURL' => $imagenPath, 
        ]);


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
        $validatedData = $request->validate([
            'idCategoria' => 'required',
            'nombreProducto' => 'required|string',
            'descripcionProducto' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto->idCategoria = $validatedData['idCategoria'];
        $producto->nombreProducto = $validatedData['nombreProducto'];
        $producto->descripcionProducto = $validatedData['descripcionProducto'];

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/imagenes');

            if ($producto->fotoURL) {
                Storage::delete($producto->fotoURL);
            }
            $imagenPath = str_replace('public/', '', $imagenPath); 
            $producto->fotoURL = $imagenPath;
        }

        $producto->save();

        return redirect()->route('productos.productoIndex')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->fotoURL) {
            Storage::delete('public/' . $producto->fotoURL);
        }

        $producto->delete();

        return Redirect::route('productos.productoIndex')->with('success', 'Producto eliminado exitosamente.');
    }

}
