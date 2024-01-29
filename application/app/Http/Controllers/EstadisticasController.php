<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function index()
    {
        return view('estadisticas.estadisticas');
    }
}
