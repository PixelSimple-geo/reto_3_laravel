<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with(['ticketProductos', 'ticketProductos.formatoProducto',
            'ticketProductos.formatoProducto.producto', 'ticketProductos.formatoProducto.producto.categoria'])->get();
        return response()->json(['pedidos' => $pedidos]);
    }

    public function store(Request $request)
    {
        $producto = Producto::create($request->all());
        return response()->json(['producto' => $producto]);
        return "Hello";
    }

    public function getCsrfToken()
    {
        return response()->json(['csrfToken' => csrf_token()]);
    }
}
