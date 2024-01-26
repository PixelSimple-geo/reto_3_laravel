<?php

namespace App\Http\Controllers;

use App\Models\FormatoProducto;
use Illuminate\Http\Request;

class FormatoProductoController extends Controller
{
    public function index()
    {
        $formatosProductos = FormatoProducto::all();
        return view('formatos.formatoProductoIndex', compact('formatosProductos'));
    }

    public function create()
    {
        return view('formatos.formatoProductoCreate');
    }

    public function store(Request $request)
    {
        $formatoProducto = FormatoProducto::create($request->all());
        return redirect()->route('formatos.formatoProductoIndex')
                            ->with('success', 'Formato creado exitosamente.');    
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
        return redirect()->route('formatos.formatoProductoIndex')
                        ->with('success', 'Formato actualizado exitosamente.');       
    }

    public function destroy(FormatoProducto $formatoProducto)
    {
        $formatoProducto->delete();
        return redirect()->route('formatos.formatoProductoIndex')
                            ->with('success', 'Formato eliminado exitosamente.');        }
}
