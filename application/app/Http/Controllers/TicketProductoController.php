<?php

namespace App\Http\Controllers;

use App\Models\TicketProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\FormatoProducto;

class TicketProductoController extends Controller
{
    public function index()
    {
        $tickets = TicketProducto::all();
        return view('tickets.ticketIndex', compact('tickets'));
    }

    public function create()
    {
        $pedidos = Pedido::all(); 
        $formatosProducto = FormatoProducto::all();

        return view('tickets.ticketCreate', compact('pedidos', 'formatosProducto'));
    }

    public function store(Request $request)
    {
        $idPedido = $request->input('idPedido');
        $idFormatoProducto = $request->input('idFormatoProducto');
        $unidades = $request->input('unidades');

        DB::table('ticket_producto')->insert([
            'idPedido' => $idPedido,
            'idFormatoProducto' => $idFormatoProducto,
            'unidades' => $unidades,
        ]);

        return Redirect::route('tickets.ticketIndex')->with('success', 'Ticket creado exitosamente.');
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
                return Redirect::route('tickets.ticketIndex')->with('success', 'Ticket modificado exitosamente.');
            } else {
                echo "error update";
            }
        }
                

        public function destroy($idPedido, $idFormatoProducto)
        {
            DB::table('ticket_producto')
                    ->where('idPedido', $idPedido)
                    ->where('idFormatoProducto', $idFormatoProducto)
                    ->delete();
        
            return Redirect::route('tickets.ticketIndex')->with('success', 'Ticket eliminado exitosamente.');
        }
}
