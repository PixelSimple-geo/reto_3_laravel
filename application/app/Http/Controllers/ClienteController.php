<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $clientes = Cliente::query()
            ->where(function ($query) use ($search) {
                $query->where('nombreCliente', 'LIKE', "%$search%")
                    ->orWhere('apellidoCliente', 'LIKE', "%$search%");
            })
            ->paginate(5); 

        return view('clientes.clienteIndex', compact('clientes'));
    }

    public function create()
    {
        $codigoCliente = strtoupper(Str::random(8));

        return view('clientes.clienteCreate', compact('codigoCliente'));
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());   
        return Redirect::route('clientes.clienteIndex')->with('success', 'Cliente creado exitosamente.');
    }

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
        return Redirect::route('clientes.clienteIndex')->with('success', 'Cliente modificado exitosamente.');                        
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return Redirect::route('clientes.clienteIndex')->with('success', 'Cliente eliminado exitosamente.');
    }  
}
