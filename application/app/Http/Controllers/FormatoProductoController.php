<?php

namespace App\Http\Controllers;

use App\Models\FormatoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Producto;


class FormatoProductoController extends Controller
{
    public function index()
    {
        $formatosProductos = FormatoProducto::all();
        return view('formatos.formatoProductoIndex', compact('formatosProductos'));
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
