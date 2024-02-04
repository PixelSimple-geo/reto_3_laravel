<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\SesionCliente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PedidoController extends Controller {
    public function index(Request $request) {
        $idCliente = $this->obtenerIdCliente($request->header('auth-token'));
        $pedidos = Pedido::where('idCliente', $idCliente)
            ->with(['ticketProductos', 'ticketProductos.formatoProducto',
                'ticketProductos.formatoProducto.producto', 'ticketProductos.formatoProducto.producto.categoria'])
            ->get();
        return response()->json($pedidos);
    }

    public function store(Request $request) {
        $pedidoData = $request->only(['direccionEnvio']);
        $pedidoData['Usuario'] = null;
        $pedidoData['estadoPedido'] = 'En preparación';
        $pedidoData['fechaPedido'] = now()->toDateString();
        try {
            $pedidoData["idCliente"] = $this->obtenerIdCliente($request->header('auth-token'));
        } catch (ModelNotFoundException $exception) {
            return response()->json(["authenticated" => false], 401);
        }

        $pedido = Pedido::create($pedidoData);

        $idFormatoProductoArray = $request->input('idFormatoProducto');
        $unidadesArray = $request->input('unidades');

        $ticketProductoData = array_map(function ($idFormatoProducto, $unidades) {
            return ['idFormatoProducto' => $idFormatoProducto, 'unidades' => $unidades];
        }, $idFormatoProductoArray, $unidadesArray);

        $pedido["ticket_productos"] = $pedido->ticketProductos()->createMany($ticketProductoData);

        return response()->json(['pedido' => $pedido]);
    }

    public function destroy(string $id, Request $request) {
        try {
            $idCliente = $this->obtenerIdCliente($request->header('auth-token'));
            $pedido = Pedido::where("idCliente", $idCliente)->findOrFail($id);
            $pedido->delete();
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Pedido not found'], 404);
        }
    }

    private function obtenerIdCliente($token) {
        $sesionCliente = SesionCliente::where('token', $token)->firstOrFail();
        return $sesionCliente->idCliente;
    }
}
