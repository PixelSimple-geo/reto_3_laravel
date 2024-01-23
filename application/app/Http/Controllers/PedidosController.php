<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'clientes_id' => 'required|exists:clientes,id',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.show', $pedido->id)->with('success', 'Pedido creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        // Validar los datos del formulario
        $request->validate([
            'clientes_id' => 'required|exists:clientes,id',
        ]);

        $pedido->update([
            'clientes_id' => $request->input('clientes_id'),
        ]);

        return redirect()->route('pedidos.show', $pedido->id)->with('success', 'Pedido actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        if ($pedido->foto) {
            Storage::disk('public')->delete($pedido->foto);
        }

        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente');
    }
}
