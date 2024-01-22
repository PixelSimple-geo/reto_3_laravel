<?php

namespace App\Http\Controllers;

use App\Models\AuthoritiesGranted;
use Illuminate\Http\Request;

class AuthoritiesGrantedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authoritiesGranted = AuthoritiesGranted::all();
        return view('authorities_granted.index', compact('authoritiesGranted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authorities_granted.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Puedes añadir la lógica para almacenar nuevos AuthoritiesGranted aquí
        return redirect()->route('authorities_granted.index')->with('success', 'AuthoritiesGranted created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuthoritiesGranted  $authoritiesGranted
     * @return \Illuminate\Http\Response
     */
    public function show(AuthoritiesGranted $authoritiesGranted)
    {
        return view('authorities_granted.show', compact('authoritiesGranted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthoritiesGranted  $authoritiesGranted
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthoritiesGranted $authoritiesGranted)
    {
        return view('authorities_granted.edit', compact('authoritiesGranted'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuthoritiesGranted  $authoritiesGranted
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthoritiesGranted $authoritiesGranted)
    {
        // Puedes añadir la lógica para actualizar AuthoritiesGranted aquí
        return redirect()->route('authorities_granted.index')->with('success', 'AuthoritiesGranted updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthoritiesGranted  $authoritiesGranted
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthoritiesGranted $authoritiesGranted)
    {
        $authoritiesGranted->delete();

        return redirect()->route('authorities_granted.index')->with('success', 'AuthoritiesGranted deleted successfully');
    }
}
