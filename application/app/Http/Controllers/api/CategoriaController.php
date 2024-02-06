<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    public function index(Request $request){
        $categorias = Categoria::get();

        return response()->json($categorias);
    }

}
