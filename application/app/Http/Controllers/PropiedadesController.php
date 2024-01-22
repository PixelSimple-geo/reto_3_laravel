<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedad::all();
        return view('propiedades.index', compact('propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propiedades.create');
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
            'producto_id' => 'required|exists:productos,id',
            'formato' => 'required|string',
            'unidades' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        Propiedad::create([
            'producto_id' => $request->input('producto_id'),
            'formato' => $request->input('formato'),
            'unidades' => $request->input('unidades'),
            'precio' => $request->input('precio'),
        ]);

        return redirect()->route('propiedades.index')->with('success', 'Propiedad created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad)
    {
        return view('propiedades.show', compact('propiedad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedad $propiedad)
    {
        return view('propiedades.edit', compact('propiedad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propiedad $propiedad)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'formato' => 'required|string',
            'unidades' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $propiedad->update([
            'producto_id' => $request->input('producto_id'),
            'formato' => $request->input('formato'),
            'unidades' => $request->input('unidades'),
            'precio' => $request->input('precio'),
        ]);

        return redirect()->route('propiedades.index')->with('success', 'Propiedad updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedad $propiedad)
    {
        $propiedad->delete();

        return redirect()->route('propiedades.index')->with('success', 'Propiedad deleted successfully');
    }
}


