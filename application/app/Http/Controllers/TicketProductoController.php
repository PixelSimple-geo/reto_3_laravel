<?php

namespace App\Http\Controllers;

use App\Models\TicketProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class TicketProductoController extends Controller
{
    public function index()
    {
        $tickets = TicketProducto::all();
        return view('tickets.ticketIndex', compact('tickets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idPedido' => 'required|exists:pedidos,id',
            'idFormatoProducto' => 'required|exists:formato_productos,id',
            'unidades' => 'required|integer'
        ]);

        TicketProducto::create($request->all());
        return Redirect::route('tickets.ticketIndex')->with('success', 'TicketProducto creado exitosamente.');
    }

    public function show(TicketProducto $ticketProducto)
    {
        return Redirect::route('tickets.ticketIndex')->with('ticketProducto', $ticketProducto);
    }

    public function edit($idPedido, $idFormatoProducto)
    {
        $ticket = TicketProducto::where('idPedido', $idPedido)
                                    ->where('idFormatoProducto', $idFormatoProducto)
                                    ->firstOrFail();

        return view('tickets.ticketEdit', compact('ticket'));
    }


    public function update(Request $request, $idPedido, $idFormatoProducto)
    {
        $ticketProducto = TicketProducto::where('idPedido', $idPedido)
                                        ->where('idFormatoProducto', $idFormatoProducto)
                                        ->firstOrFail();

        $affectedRows = DB::table('ticket_producto')
                            ->where('idPedido', $idPedido)
                            ->where('idFormatoProducto', $idFormatoProducto)
                            ->update([
                                'unidades' => $request->input('unidades'),
                            ]);

            if($affectedRows > 0) {
                return redirect()->route('tickets.ticketIndex');
            } else {
                echo "error update";
            }
        }
                

    public function destroy(TicketProducto $ticketProducto)
    {
        $ticketProducto->delete();
        return Redirect::route('tickets.ticketIndex')->with('success', 'TicketProducto eliminado exitosamente.');
    }
}
