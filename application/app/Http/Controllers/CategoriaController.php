<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $categorias = Categoria::query()
            ->when($search, function ($query, $search) {
                return $query->where('nombreCategoria', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view('categorias.categoriaIndex', compact('categorias'));
    }


    public function create()
    {
        return view('categorias.categoriaCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreCategoria' => 'required|string|unique:categorias'
        ]);

        $categoria = Categoria::create($request->all());
        return Redirect::route('categorias.categoriaIndex')->with('success', 'Categoria creada exitosamente.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.categoriaEdit', compact('categoria'));
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
        return Redirect::route('categorias.categoriaIndex')->with('success', 'Categoria modificada exitosamente.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return Redirect::route('categorias.categoriaIndex')->with('success', 'Categoria eliminada exitosamente.');
    }
}