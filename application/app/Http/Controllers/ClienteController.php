<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view("clientes.clienteIndex", compact('clientes'));
    }

    public function create()
    {
        $codigoCliente = strtoupper(Str::random(8));

        return view('clientes.clienteCreate', compact('codigoCliente'));
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()->route('clientes.clienteIndex')
                            ->with('success', 'Cliente creado exitosamente.');      }

    public function edit(Cliente $cliente)
    {
        return view('clientes.clienteEdit', compact('cliente'));
    }


    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.clienteIndex')
                            ->with('success', 'Cliente actualizado exitosamente.');    
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(null, 204);
    }
}
