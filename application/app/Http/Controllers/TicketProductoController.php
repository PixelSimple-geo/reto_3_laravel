<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use App\Models\TicketProducto;
use App\Models\Pedido;
use App\Models\FormatoProducto;

class TicketProductoController extends Controller
{
    public function index()
    {
        $tickets = TicketProducto::with('formatoProducto')->paginate(5); 
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

        $formatoProducto = FormatoProducto::find($idFormatoProducto);

        if ($formatoProducto->unidades >= $unidades) {
            try {
                DB::beginTransaction();

                TicketProducto::create([
                    'idPedido' => $idPedido,
                    'idFormatoProducto' => $idFormatoProducto,
                    'unidades' => $unidades,
                ]);

                $formatoProducto->unidades -= $unidades;
                $formatoProducto->save();

                DB::commit();

                return Redirect::route('tickets.ticketIndex')->with('success', 'Ticket creado exitosamente.');
            } catch (\Exception $e) {
                DB::rollBack();
                return Redirect::route('tickets.ticketIndex')->withErrors(['unidades' => 'Error. No se le puede sumar al mismo pedido el mismo formato, edite las unidades']);
            }
        } else {
            return Redirect::route('tickets.ticketIndex')->withErrors(['unidades' => 'No hay suficientes unidades disponibles en el stock.']);
        }   
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

        $nuevasUnidades = $request->input('unidades');
        $unidadesAnteriores = $ticketProducto->unidades;

        $diferenciaUnidades = $nuevasUnidades - $unidadesAnteriores;

        $formatoProducto = FormatoProducto::find($idFormatoProducto);
        $unidadesDisponibles = $formatoProducto->unidades;

        if ($diferenciaUnidades > $unidadesDisponibles) {
            return Redirect::route('tickets.ticketIndex')->withErrors(['error' => 'No hay suficientes unidades disponibles en el stock.']);
        }

        DB::beginTransaction();
        try {
            $ticketProducto->where('idPedido', $idPedido)
                                    ->where('idFormatoProducto', $idFormatoProducto)
                                    ->update(['unidades' => $nuevasUnidades]);

            $formatoProducto->unidades -= $diferenciaUnidades;
            $formatoProducto->save();

            DB::commit();

            return Redirect::route('tickets.ticketIndex')->with('success', 'Ticket modificado exitosamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::route('tickets.ticketIndex')->withErrors(['error' => 'Error al modificar el ticket.']);
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
