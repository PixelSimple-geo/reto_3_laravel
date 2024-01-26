<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;

class PedidoController extends Controller {
    public function index()
    {
        $pedidos = Pedido::with(['ticketProductos', 'ticketProductos.formatoProducto',
            'ticketProductos.formatoProducto.producto', 'ticketProductos.formatoProducto.producto.categoria'])->get();
        return response()->json(['pedidos' => $pedidos]);
    }
}
