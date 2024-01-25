<?php

namespace App\Http\Controllers;

use App\Models\TicketProducto;
use Illuminate\Http\Request;

class TicketProductoController extends Controller
{
    public function index()
    {
        $ticketsProductos = TicketProducto::all();
        return response()->json($ticketsProductos, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idPedido' => 'required|exists:pedidos,id',
            'idFormatoProducto' => 'required|exists:formato_productos,id',
            'unidades' => 'required|integer'
        ]);

        $ticketProducto = TicketProducto::create($request->all());
        return response()->json($ticketProducto, 201);
    }

    public function show(TicketProducto $ticketProducto)
    {
        return response()->json($ticketProducto, 200);
    }

    public function update(Request $request, TicketProducto $ticketProducto)
    {
        $request->validate([
            'idPedido' => 'required|exists:pedidos,id',
            'idFormatoProducto' => 'required|exists:formato_productos,id',
            'unidades' => 'required|integer'
        ]);

        $ticketProducto->update($request->all());
        return response()->json($ticketProducto, 200);
    }

    public function destroy(TicketProducto $ticketProducto)
    {
        $ticketProducto->delete();
        return response()->json(null, 204);
    }
}
