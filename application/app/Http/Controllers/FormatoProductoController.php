<?php

namespace App\Http\Controllers;

use App\Models\FormatoProducto;
use Illuminate\Http\Request;

class FormatoProductoController extends Controller
{
    public function index()
    {
        $formatosProductos = FormatoProducto::all();
        return response()->json($formatosProductos, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idProducto' => 'required|exists:productos,id',
            'formatoEnvase' => 'required|string',
            'unidades' => 'required|integer',
            'precioUnitario' => 'required|numeric'
        ]);

        $formatoProducto = FormatoProducto::create($request->all());
        return response()->json($formatoProducto, 201);
    }

    public function show(FormatoProducto $formatoProducto)
    {
        return response()->json($formatoProducto, 200);
    }

    public function update(Request $request, FormatoProducto $formatoProducto)
    {
        $request->validate([
            'idProducto' => 'required|exists:productos,id',
            'formatoEnvase' => 'required|string',
            'unidades' => 'required|integer',
            'precioUnitario' => 'required|numeric'
        ]);

        $formatoProducto->update($request->all());
        return response()->json($formatoProducto, 200);
    }

    public function destroy(FormatoProducto $formatoProducto)
    {
        $formatoProducto->delete();
        return response()->json(null, 204);
    }
}
