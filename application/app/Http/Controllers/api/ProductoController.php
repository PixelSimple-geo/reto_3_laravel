<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'formatosProducto'])->get();
        return response()->json($productos);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Producto $producto)
    {

    }

    public function edit(Producto $producto)
    {

    }

    public function update(Request $request, Producto $producto)
    {

    }

    public function destroy(Producto $producto)
    {

    }
}
