<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class TableroController extends Controller
{
    public function showTablero(Request $request)
    {
        $user = Auth::user();

        $pedidosQuery = Pedido::query();

        if ($request->filled('cliente')) {
            $pedidosQuery->where('idCliente', $request->cliente);
        }

        if ($request->filled('fecha_inicio')) {
            $pedidosQuery->whereDate('fechaPedido', '>=', $request->fecha_inicio);
        }

        if ($request->filled('fecha_fin')) {
            $pedidosQuery->whereDate('fechaPedido', '<=', $request->fecha_fin);
        }

        if ($request->filled('estado')) {
            $pedidosQuery->where('estadoPedido', $request->estado);
        }

         if ($user->hasRole('comercial')) {
            $pedidosQuery->where('Usuario', $user->id);
        } elseif ($user->hasRole('administrativo') || $user->hasRole('responsable')) {
            // No se aplica ningún filtro adicional
        }

        $pedidos = $pedidosQuery->paginate(5);
        $pedidos->appends($request->only(['cliente', 'fecha_inicio', 'fecha_fin', 'estado']));

        $clientes = Cliente::all();

        return view('dashboard', compact('pedidos', 'clientes'));
    }
}
