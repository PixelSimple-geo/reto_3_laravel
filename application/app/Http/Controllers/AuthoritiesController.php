<?php

namespace App\Http\Controllers;

use App\Models\Authority;
use Illuminate\Http\Request;

class AuthoritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorities = Authority::all();
        return view('authorities.index', compact('authorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authorities.create');
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
            'rol' => 'required|unique:authorities',
        ]);

        Authority::create($request->all());

        return redirect()->route('authorities.index')->with('success', 'Authority created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authority  $authority
     * @return \Illuminate\Http\Response
     */
    public function show(Authority $authority)
    {
        return view('authorities.show', compact('authority'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authority  $authority
     * @return \Illuminate\Http\Response
     */
    public function edit(Authority $authority)
    {
        return view('authorities.edit', compact('authority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Authority  $authority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Authority $authority)
    {
        $request->validate([
            'rol' => 'required|unique:authorities,rol,' . $authority->id,
        ]);

        $authority->update($request->all());

        return redirect()->route('authorities.index')->with('success', 'Authority updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authority  $authority
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authority $authority)
    {
        $authority->delete();

        return redirect()->route('authorities.index')->with('success', 'Authority deleted successfully');
    }
}
