<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::orderBy('fechaPedido', 'desc')->paginate(5);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('pedidos.pedidoCreate', compact('clientes'));
    }

    public function store(Request $request)
    {
        $usuario = Auth::user();

        $pedido = new Pedido();
        $pedido->Usuario = $usuario->id;
        $pedido->idCliente = $request->idCliente;
        $pedido->fechaPedido = $request->fecha;
        $pedido->direccionEnvio = $request->direccion;
        $pedido->estadoPedido = $request->estado;

        $pedido->save();

        return Redirect::route('dashboard')->with('success', 'Pedido creado exitosamente.');
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();

        return view('pedidos.pedidoEdit', compact('pedido', 'clientes'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $pedido->update([
            'idCliente' => $request->idCliente,
            'fechaPedido' => $request->fecha,
            'direccionEnvio' => $request->direccion,
            'estadoPedido' => $request->estado,
        ]);

        return Redirect::route('dashboard')->with('success', 'Pedido modificado exitosamente.');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return Redirect::route('dashboard')->with('success', 'Pedido eliminado exitosamente.');
    }
}
