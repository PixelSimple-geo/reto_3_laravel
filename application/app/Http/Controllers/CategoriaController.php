<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreCategoria' => 'required|string|unique:categorias'
        ]);

        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function show(Categoria $categoria)
    {
        return response()->json($categoria, 200);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombreCategoria' => 'required|string|unique:categorias,nombreCategoria,' . $categoria->id
        ]);

        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json(null, 204);
    }
}
