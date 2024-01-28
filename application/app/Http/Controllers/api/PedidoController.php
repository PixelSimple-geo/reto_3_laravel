<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $pedidoData = $request->only(['direccionEnvio']);
        $pedidoData['idCliente'] = 1;
        $pedidoData['Usuario'] = null;
        $pedidoData['estadoPedido'] = 'En preparación';
        $pedidoData['fechaPedido'] = date('Y-m-d');

        $pedido = Pedido::create($pedidoData);

        $idFormatoProductoArray = $request->input('idFormatoProducto');
        $unidadesArray = $request->input('unidades');

        $ticketProductoData = array_map(function ($idFormatoProducto, $unidades) {
            return ['idFormatoProducto' => $idFormatoProducto, 'unidades' => $unidades];
        }, $idFormatoProductoArray, $unidadesArray);

        $pedido["ticket_productos"] = $pedido->ticketProductos()->createMany($ticketProductoData);

        return response()->json(['pedido' => $pedido]);
    }

    public function destroy(string $id)
    {
        try {
            $pedido = Pedido::findOrFail($id);
            $pedido->delete();
            echo $id;
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Pedido not found'], 404);
        }
    }
}
