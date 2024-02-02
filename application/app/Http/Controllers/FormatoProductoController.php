<?php

namespace App\Http\Controllers;

use App\Models\FormatoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Producto;


class FormatoProductoController extends Controller
{
    public function index(Request $request)
    {
        $formato = $request->input('formato');
        $unidades = $request->input('unidades');
        $precioMin = $request->input('precio_min');
        $precioMax = $request->input('precio_max');
        $nombreProducto = $request->input('nombre_producto');

        $query = FormatoProducto::query()->with('producto');

        if ($formato) {
            $query->where('formatoEnvase', $formato);
        }

        if ($unidades) {
            $query->where('unidades', 'LIKE', "%$unidades%");
        }

        if ($precioMin && $precioMax) {
            $query->whereBetween('precioUnitario', [$precioMin, $precioMax]);
        }

        if ($nombreProducto) {
            $query->whereHas('producto', function ($query) use ($nombreProducto) {
                $query->where('nombreProducto', 'LIKE', "%$nombreProducto%");
            });
        }

        $formatosProductos = $query->paginate(5);

        $formatosProductos->appends($request->only(['formato', 'unidades', 'precio_min', 'precio_max', 'nombre_producto']));

        $uniqueFormatos = FormatoProducto::distinct()->pluck('formatoEnvase');

        return view('formatos.formatoProductoIndex', compact('formatosProductos', 'uniqueFormatos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('formatos.formatoProductoCreate', compact('productos'));
    }

    public function store(Request $request)
    {
        $formatoProducto = FormatoProducto::create($request->all());
        return Redirect::route('formatos.formatoProductoIndex')->with('success', 'Formato creado exitosamente.');
    }

    public function show(FormatoProducto $formatoProducto)
    {
        return response()->json($formatoProducto, 200);
    }

    public function edit(FormatoProducto $formatoProducto)
    {
        return view('formatos.formatoProductoEdit', compact('formatoProducto'));
    }

    public function update(Request $request, FormatoProducto $formatoProducto)
    {
        $formatoProducto->update($request->all());
        return Redirect::route('formatos.formatoProductoIndex')->with('success', 'Formato modificado exitosamente.');
      
    }

    public function destroy(FormatoProducto $formatoProducto)
    {
        $formatoProducto->delete();
        return Redirect::route('formatos.formatoProductoIndex')->with('success', 'Formato eliminado exitosamente.');
    }
}
