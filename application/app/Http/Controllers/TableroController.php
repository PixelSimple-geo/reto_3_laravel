<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class TableroController extends Controller
{
    public function showTablero()
{
    $user = Auth::user();
    $pedidos = [];

    switch ($user->rol) {
        case 'comercial':
            $pedidos = Pedido::where('Usuario', $user->id)->get();
            break;
        case 'administrativo':
            $pedidos = Pedido::all();
            break;
        case 'responsable':
            $pedidos = Pedido::all();
            break;
        default:
            $pedidos = [];
            break;
    }

    return view('dashboard', compact('pedidos'));
}

}
